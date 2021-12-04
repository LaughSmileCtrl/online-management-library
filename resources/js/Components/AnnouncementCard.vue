<template>
    <div class="card">
        <div class="card-body">
            <div class=" collapse w-96 shadow rounded-box bg-white border-base-300 collapse-arrow " >
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    <span :class="setClass" >
                        <i :class="setIcon" ></i> 
                        {{ announcement.type.name }} 
                    </span>
                    {{ announcement.title }}
                    <p class="text-xs opacity-50">{{ announcement.user.name }}</p>
                    <p class="text-xs opacity-50">{{ (new Date(announcement.created_at)).toLocaleDateString('id-ID') }}</p>
                </div>
                <div class="collapse-content">
                    <p>
                        {{ announcement.message }}
                    </p>
                </div>
                <div class="justify-end btn-group mr-2 my-2">
                    <button class="btn btn-secondary btn-xs" @click="editAction"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-error btn-xs" @click="deleteAction"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    computed: {
        setClass() {
            return (this.announcement.type_id == 1)
                ? 'badge badge-outline-white badge-accent block mb-2'
                : 'badge badge-outline-white badge-secondary block mb-2'
        }, 
        setIcon() {
            return (this.announcement.type_id == 1)
                ? 'fas fa-info-circle'
                : 'fas fa-exclamation-circle'
        }
    },
    props: ['announcement'],
    methods: {
        editAction() {
            this.$inertia.get(route('announcement.edit', this.announcement.id));
        },
        deleteAction() {
            this.$swal({
                title: 'Anda yakin?',
                text:
                    'Apakah anda benar akan menghapus pengumuman ini?',
                icon: 'qustion',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route('announcement.destroy', this.announcement.id), {
                        onSuccess: page => {
                            this.$swal(page.props.flash.message, '', 'success');
                            this.$inertia.reload({ only: ['announcement'] });
                        }, 
                        onError: errors => {
                            this.$swal('gagal ', '', 'error');
                        },
                    });
                }
            });
        },
    },
}
</script>

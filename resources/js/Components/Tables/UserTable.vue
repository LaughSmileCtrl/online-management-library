<template>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Bergabung</th>
                    <th>NRP</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) of users" :key="(user, index)" class="hover">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="w-12 h-12 mask mask-squircle">
                                    <img
                                        :src="user.image"
                                        alt="Avatar Tailwind CSS Component"
                                    />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ user.name }}</div>
                                <div class="text-sm">{{ user.email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ (new Date(user.created_at)).toLocaleDateString('id-ID') }}</td>
                    <td v-if="user.detail">{{ user.detail.nrp }}</td>
                    <td v-else></td>
                    <td v-if="user.detail.department_id != 0">{{ user.detail.department.name }}</td>
                    <td v-else></td>
                    <th>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm" @click="deleteUser(user.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Bergabung</th>
                    <th>NRP</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>


export default {
    props: ['users'],
    methods: {
        deleteUser(id) {
            this.$swal({
                title: 'Anda yakin?',
                text:
                    'Apakah anda benar akan menghapus member ini?',
                icon: 'qustion',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route('user.destroy', id), {
                        onSuccess: page => {
                            this.$swal(page.props.flash.message, '', 'success');
                            this.$inertia.reload({ only: ['books'] });
                        }, 
                        onError: errors => {
                            this.$swal('gagal ', '', 'error');
                        },
                    });
                }
            });
        }
    }
}
</script>

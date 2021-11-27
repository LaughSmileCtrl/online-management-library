<template>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Tagihan</th>
                    <th>Terbayar</th>
                    <th>Sisa Tagihan</th>
                    <th>Bayar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(penalty, index) of penalties" :key="index">
                    <th>{{ index + 1 }}</th>
                    <td>{{ penalty.user_id }}</td>
                    <td>{{ penalty.user.name }}</td>
                    <td>{{ penalty.bill }}</td>
                    <td>{{ penalty.paid_off }}</td>
                    <td>{{ penalty.bill- penalty.paid_off }}</td>
                    <td>
                        <div data-tip="bayar" class="tooltip">
                            <button
                                class="btn btn-secondary btn-sm"
                                @click="paidAction(penalty.id)"
                            >
                                <i class="fas fa-wallet"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Tagihan</th>
                    <th>Terbayar</th>
                    <th>Sisa Tagihan</th>
                    <th>Bayar</th>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
export default {
    props: ["penalties"],
    methods: {
        paidAction(id) {
            this.$swal({
                title: "Masukkan Jumlah yang dibayarkan",
                input: "number",
                inputPlaceholder: "jumlah yang dibayarkan",
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                reverseButtons: true,        
            }).then(result => {
                if(result.value != null) {
                    this.$inertia.patch(route('penalties.update', id), 
                        {paid: result.value}, {
                            onSuccess: page => {
                                this.$swal(page.props.flash.message, '', 'success');
                                this.$inertia.reload({ only: ['penalties'] });
                            }, 
                            onError: errors => {
                                this.$swal('gagal ', '', 'error');
                            },
                        })
                }
            })
        },
    },
};
</script>

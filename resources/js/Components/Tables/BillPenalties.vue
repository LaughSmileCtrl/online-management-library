<template>
    <div class="overflow-x-auto">
        <table class="table w-full table-compact">
            <thead>
                <tr>
                    <th></th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Batas Kembali</th>
                    <th>Tanggal Dikembalikan</th>
                    <th>Tagihan</th>
                    <th>Terbayar</th>
                    <th>Sisa Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(penalty, index) of penalties" :key="index">
                    <td>{{ index+1 }}</td>
                    <td>{{ penalty.book.title }}</td>
                    <td>{{ (new Date(penalty.borrow_at)).toLocaleDateString('id-ID') }}</td>
                    <td>{{ (new Date(penalty.due_at)).toLocaleDateString('id-ID') }}</td>
                    <td>{{ (new Date(penalty.return_at)).toLocaleDateString('id-ID') }}</td>
                    <td>{{ penalty.bill }}</td>
                    <td>{{ penalty.paid_off }}</td>
                    <td>{{ penalty.bill - penalty.paid_off }}</td>
                </tr>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" class="text-center font-bold">Jumlah Tagihan</td>
                    <td>{{ totalBill }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>

export default {
    props: ['penalties'],
    computed: {
        totalBill() {
            var total = 0;
            this.penalties.forEach(penalty => {
                total += penalty.bill - penalty.paid_off
            });

            return total;
        }
    }
}
</script>

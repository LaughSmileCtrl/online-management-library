<template>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Favorite Color</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover" @click="$emit('rowClicked')">
                    <th>5</th>
                    <td>31xxxxx21</td>
                    <td>Yancy Tear</td>
                    <td>Community Outreach Specialist</td>
                    <td>Indigo</td>
                    <td>
                        <div data-tip="terima" class="tooltip">
                            <button class="btn btn-info btn-sm rounded-none rounded-l" @click="$emit('admitBook')"><i class="fas fa-check-circle"></i></button>
                        </div>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="$emit('deleteBook')"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover" @click="$emit('rowClicked')">
                    <th>6</th>
                    <td>31xxxxx31</td>
                    <td>Irma Vasilik</td>
                    <td>Editor</td>
                    <td>Purple</td>
                    <td>
                        <div data-tip="terima" class="tooltip">
                            <button class="btn btn-info btn-sm rounded-none rounded-l" @click="$emit('admitBook')"><i class="fas fa-check-circle"></i></button>
                        </div>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="$emit('deleteBook')"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover" @click="$emit('rowClicked')">
                    <th>7</th>
                    <td>31xxxxx43</td>
                    <td>Meghann Durtnal</td>
                    <td>Staff Accountant IV</td>
                    <td>Yellow</td>
                    <td>
                        <div data-tip="terima" class="tooltip">
                            <button class="btn btn-info btn-sm rounded-none rounded-l" @click="$emit('admitBook')"><i class="fas fa-check-circle"></i></button>
                        </div>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="$emit('deleteBook')"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover" @click="$emit('rowClicked')">
                    <th>8</th>
                    <td>31xxxxx43</td>
                    <td>Sammy Seston</td>
                    <td>Accountant I</td>
                    <td>Crimson</td>
                    <td>
                        <div data-tip="terima" class="tooltip">
                            <button class="btn btn-info btn-sm rounded-none rounded-l" @click="$emit('admitBook')"><i class="fas fa-check-circle"></i></button>
                        </div>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="$emit('deleteBook')"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
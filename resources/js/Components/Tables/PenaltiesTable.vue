<template>
  <div class="overflow-x-auto">
    <table class="table w-full">
      <thead>
        <tr>
          <th>Name</th>
          <th>Job</th>
          <th>Favorite Color</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="w-12 h-12 mask mask-squircle">
                  <img
                    src="/images/tailwind-css-component-profile-2@56w.png"
                    alt="Avatar Tailwind CSS Component"
                  />
                </div>
              </div>
              <div>
                <div class="font-bold">Hart Hagerty</div>
                <div class="text-sm HartHagerty50@.mail.com">email.com</div>
              </div>
            </div>
          </td>
          <td>Zemlak, Daniel and Leannon></td>
          <td>Purple</td>
          <th>
            <div data-tip="ubah" class="tooltip">
              <button
                class="btn btn-info btn-sm rounded-none rounded-l"
                @click="$emit('editBook')"
              >
                <i class="fas fa-edit"></i>
              </button>
            </div>
            <div data-tip="hapus" class="tooltip">
              <button
                class="btn btn-error btn-sm rounded-none rounded-r"
                @click="$emit('deleteBook')"
              >
                <i class="fa fa-trash"></i>
              </button>
            </div>
          </th>
        </tr>
        <tr>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="w-12 h-12 mask mask-squircle">
                  <img
                    src="/images/tailwind-css-component-profile-3@56w.png"
                    alt="Avatar Tailwind CSS Component"
                  />
                </div>
              </div>
              <div>
                <div class="font-bold">Brice Swyre</div>
                <div class="text-sm opacity-50">BriceSwyre@.mail.com</div>
              </div>
            </div>
          </td>
          <td>Carroll Group></td>
          <td>Red</td>
          <th>
            <div data-tip="ubah" class="tooltip">
              <button
                class="btn btn-info btn-sm rounded-none rounded-l"
                @click="$emit('editBook')"
              >
                <i class="fas fa-edit"></i>
              </button>
            </div>
            <div data-tip="hapus" class="tooltip">
              <button
                class="btn btn-error btn-sm rounded-none rounded-r"
                @click="$emit('deleteBook')"
              >
                <i class="fa fa-trash"></i>
              </button>
            </div>
          </th>
        </tr>
        <tr>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="w-12 h-12 mask mask-squircle">
                  <img
                    src="/images/tailwind-css-component-profile-4@56w.png"
                    alt="Avatar Tailwind CSS Component"
                  />
                </div>
              </div>
              <div>
                <div class="font-bold">Marjy Ferencz</div>
                <div class="text-sm opacity-50">MarjyFerencz@.mail.com</div>
              </div>
            </div>
          </td>
          <td>Rowe-Schoen</td>
          <td>Crimson</td>
          <th>
            <div data-tip="ubah" class="tooltip">
              <button
                class="btn btn-info btn-sm rounded-none rounded-l"
                @click="$emit('editBook')"
              >
                <i class="fas fa-edit"></i>
              </button>
            </div>
            <div data-tip="hapus" class="tooltip">
              <button
                class="btn btn-error btn-sm rounded-none rounded-r"
                @click="$emit('deleteBook')"
              >
                <i class="fa fa-trash"></i>
              </button>
            </div>
          </th>
        </tr>
        <tr>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="w-12 h-12 mask mask-squircle">
                  <img
                    src="/images/tailwind-css-component-profile-5@56w.png"
                    alt="Avatar Tailwind CSS Component"
                  />
                </div>
              </div>
              <div>
                <div class="font-bold">Yancy Tear</div>
                <div class="text-sm opacity-50">YancyTear@.mail.com</div>
              </div>
            </div>
          </td>
          <td>Wyman-Ledner></td>
          <td>Indigo</td>
          <th>
            <div data-tip="ubah" class="tooltip">
              <button
                class="btn btn-info btn-sm rounded-none rounded-l"
                @click="$emit('editBook')"
              >
                <i class="fas fa-edit"></i>
              </button>
            </div>
            <div data-tip="hapus" class="tooltip">
              <button
                class="btn btn-error btn-sm rounded-none rounded-r"
                @click="$emit('deleteBook')"
              >
                <i class="fa fa-trash"></i>
              </button>
            </div>
          </th>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Name</th>
          <th>Job</th>
          <th>Favorite Color</th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</template>
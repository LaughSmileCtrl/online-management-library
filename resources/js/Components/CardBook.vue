<template>
  <div
    class="
      card
      md:card-side
      compact
      flex-shrink
      shadow
      border-gray-500
      m-3
      w-46
      md:w-96
      h-60
      bg-white
      shadow
    "
  >
    <figure class="hidden md:block">
      <img src="@/Img/cover.jpg" class="rounded-lg h-60" />
    </figure>
    <div class="max-w-md card-body">
      <h2 class="card-title">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      </h2>
      <p>Penulis: lorem ipsum</p>
      <p>Tahun Terbit: 2021</p>
      <div class="absolute bottom-9 pb-5">
        Kembalikan Sebelum<br />
        12 November 2021
      </div>
      <div class="btn-group absolute bottom-5 right-5 shadow rounded">
        <button class="btn btn-sm btn-neutral" @click="openDesc">Detail</button>
        <button :class="btnClassify" @click="showModal">{{ btnText }}</button>
      </div>
      
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  data() {
    return {
      cardTypes: [
        {
          type: 'borrow',
          text: 'pinjam',
          btnClass: 'info'
        },
        {
          type: 'return',
          text: 'kembalikan',
          btnClass: 'warning'
        }
      ],
    };
  },
  props: {
    type: Number,
  },
  computed: {
    btnText() {
      return this.cardTypes[this.type].text;
    },
    btnClassify() {
      return "btn btn-" + this.cardTypes[this.type].btnClass + " btn-sm ";
    },
  },
  methods: {
    showModal() {
      if(this.cardTypes[this.type].type == 'borrow') {
        this.showAgreement();
      } else {
        this.showAlert();
      }
    },
    showAgreement() {
      this.$swal({
        title: 'Persetujuan',
        width: '52rem',
        showCloseButton: true,
        html: `
          <div class="h-56 overflow-auto ml-3 mb-5 text-left">
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. In      ventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. In      ventore odit quis 
              minus magni alias doloremque evebg-green-200 w-52 niet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. In      ventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
              minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
              culpa atque tempore explicabo velit doloremque mollitia?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
              illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
              corporis eum enim ab aut nisi natus. Labore, veniam facilis?
            </p>      
          </div>
          <div class="ml-3 mt-3 text-left">
            <input id="agree-check" type="checkbox" class="checkbox checkbox-primary">
            <label for="agree-check" class="cursor-pointer">
              saya setuju dengan persyaratan tersebut
            </label>
          </div>
        `,
      }).then((result) => {
        if (result.isConfirmed) {
          this.showAlert();
        }
      });
    },
    showAlert() {
      this.$swal({
        title: 'Anda yakin?',
        text: "Apakah anda benar akan " + this.cardTypes[this.type].text + " buku ini?",
        icon: 'qustion',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya, '+ this.cardTypes[this.type].text,
        cancelButtonText: 'Tidak',
        reverseButtons: true,
      }).then((result) => {
        if (result.isConfirmed) {
          this.$swal('Tersimpan', '', 'success')
        }
      })
    },
    openDesc() {
      this.$swal({
        title: 'Deskripsi Buku',
        width: '52rem',
        showCloseButton: true,
        html: `
          <div
            class="
              flex flex-wrap
              w-full
              bg-white
              justify-center
            "
          >
              <div class="flex flex-wrap justify-center w-2/3 md:w-1/3 h-full pb-10">
                  <img src="/images/cover.jpg" class="rounded-lg h-56" />
              </div>
              <div class="w-2/3 px-8 text-left">
                  <h3 class="font-bold text-2xl mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h3>
                  <h5 class="font-bold inline-block">Penulis</h5><h4>Lorem Ipsum Dolor</h4>
                  <h5 class="font-bold inline-block mt-3">Penerbit</h5><h4>Adipisicing</h4>
                  <h5 class="font-bold inline-block mt-3">Tahun Terbit</h5><h4>2021</h4>
                  <h5 class="font-bold inline-block mt-3">Stock</h5><h4>5</h4>
                  <h5 class="font-bold inline-block mt-3">Kategori</h5><h4>Baru</h4>
                  <h5 class="font-bold inline-block mt-3">Deskripsi</h5>
                  <p class="text-md">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
                      minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
                      culpa atque tempore explicabo velit doloremque mollitia?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
                      illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
                      corporis eum enim ab aut nisi natus. Labore, veniam facilis?

                      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore odit quis 
                      minus magni alias doloremque eveniet veniam eum minima sint? Ipsam sunt id, 
                      culpa atque tempore explicabo velit doloremque mollitia?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate obcaecati 
                      illo cumque nihil deleniti, repellat quis. Dolore cupiditate rerum porro 
                      corporis eum enim ab aut nisi natus. Labore, veniam facilis?
                  </p>      
              </div>
          </div>
        `,
      });
    }
  }
};
</script>
<template>
  <div class="dropdown dropdown-end">
    <div
      tabindex="0"
      class="
        w-12
        h-12
        ring ring-blue-600 ring-offset-base-100 ring-offset-2
        rounded-full
      "
    >
      <img src="@/Img/avatar.png" class="mask mask-circle" />
    </div>
    <ul
      tabindex="0"
      class="
        mt-2
        p-2
        shadow
        menu
        dropdown-content
        rounded
        bg-base-100
        w-52
        text-blue-900
      "
    >
      <li>
        <Link :href="route('user.profile')"><i class="fa fa-user mr-2"></i> Ubah Profile</Link>
      </li>
      <li>
        <a><i class="fa fa-key mr-2"></i> Ubah Password</a>
      </li>
      <li class="border-t-2">
        <a><i class="fa fa-sign-out-alt mr-2"></i> Log Out</a>
      </li>
    </ul>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Link,
  }
}
</script>

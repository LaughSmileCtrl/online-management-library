<template>
<section class="text-blue-900 body-font overflow-hidden min-h-screen">
    <div class="container px-5 py-24 m-auto flex flex-wrap content-center">
        <div class="lg:w-4/5 m-auto flex flex-wrap">
            <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden rounded-lg m-auto bg-gray-50 shadow-2xl">
                    <slot name="form"/>
                </div>
            </div>
            <div class="lg:w-1/2 w-full hidden md:block lg:h-auto h-64 object-cover object-center rounded">
                <slot name="image"/>
            </div>
        </div>
    </div>
</section>
</template>
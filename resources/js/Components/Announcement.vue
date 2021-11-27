<template>
    <div :class="border">
        <div class="flex-1">
            <div :class="text">
                <i :class="icon"></i>
            </div>
            <label>
                <h4>{{ announcement.title }}</h4>
                <p class="text-sm text-base-content text-opacity-60">
					{{ announcement.message }}
                </p>
            </label>
        </div>
    </div>
</template>
<script>
export default {
	props:['announcement'],
	computed: {
		icon() {
			return (this.announcement.id == 1)
				? 'far fa-bell object-left'
				: 'fas fa-exclamation-circle object-left';
		},
		text() {
			return (this.announcement.id == 1)
				? 'flex-shrink-0 mx-2 text-accent'
				: 'flex-shrink-0 mx-2 text-secondary';
		},
		border() {
			return (this.announcement.id == 1)
				? 'alert border border-accent border-2 my-5'
				: 'alert border border-secondary border-2 my-5';
		}
	}
};
</script>

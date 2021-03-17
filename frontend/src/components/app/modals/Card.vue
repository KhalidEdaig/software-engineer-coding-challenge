<template>
  <div
    :class="'bg-' + color + '-50 border-' + color + '-400'"
    class="border-b-2 overflow-hidden shadow rounded-lg"
  >
    <div class="px-2 py-2 sm:p-3">
      <div class="flex items-center">
        <slot name="icon"></slot>
        <div class="ml-5 w-0 flex-1">
          <dt class="text-sm font-medium text-gray-500 truncate">
            {{ title }}
          </dt>
          <dd class="flex items-baseline">
            <slot name="body"></slot>
          </dd>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "card",
  props: {
    color: {
      type: String,
      default: "blue",
    },
    title: String,
    body: [String, Number],
  },
};
</script>

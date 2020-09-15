<template>
  <div>
    <!-- Navigation Links -->
    <div class="pt-2 pb-3 space-y-1">
      <jet-responsive-nav-link
        href="/dashboard"
        :active="$page.currentRouteName == 'dashboard'"
      >
        Dashboard
      </jet-responsive-nav-link>
    </div>
  </div>
</template>

<script>
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    JetResponsiveNavLink
  }
};
</script>

<style></style>

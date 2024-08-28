<div id="app">
    <div class="admin-form theme-primary theme-primary">
        <router-view v-slot="{ Component, route }">
            <transition name="fade" mode="out-in">
                <div :key="route.name">
                    <component :is="Component"></component>
                </div>
            </transition>
        </router-view>
    </div>
    <modal></modal>
    <z-notification-toast></z-notification-toast>
</div>
<script setup>
const props = defineProps({
    message: String,
});

const setupNotificationDismiss = () => {
    const notificationElement = event.currentTarget.closest('.notification');
    if (notificationElement) {
        notificationElement.classList.add('hidden');
    }
}
</script>

<!--Componente encargado de mostar una notificación de color azul
- Ejm de uso:
  <NotificationSuccess :message="$page.props.flash.message" />
- La variable message esta configurada en el archivo HandleInertiaRequest
-->
<template>
    <div class="notification blue" v-if="message">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>{{ message }}</b>
            </div>
            <button @click="setupNotificationDismiss()" type="button"
                class="button small textual --jb-notification-dismiss bg-white">Cerrar</button>
        </div>
    </div>
</template>

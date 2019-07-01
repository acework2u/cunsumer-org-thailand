<template>
    <div class="google-map" :id="mapName"></div>
</template>
<script>
    export default {
        name: 'google-map',
        props: ['name'],
        data: function () {
            return {
                mapName: this.name + "-map",
            }
        }
    };
</script>

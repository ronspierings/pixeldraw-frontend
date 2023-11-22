<template>
    <v-container class="fill-height bg-red" fluid>
        <v-responsive width="100%"></v-responsive>

        <v-col v-for="pixel in pixels" :key="pixel">
            <v-row fluid :style="{ backgroundColor: pixel._color, height: '100px', width: '100px' }">
                {{ pixel._color }}
            </v-row>
        </v-col>
    </v-container>
</template>

<script>
    // import PixelData from '@/classes/pixelData.js'

    export default {
        data () 
            {
            return {
                pixels: [
                    new PixelData("#CCC"),
                    new PixelData("#DDD"),
                    new PixelData("#123"),
                    new PixelData("#EEE")
                ]
            }
        }        
    }
</script>@/classes/PixelData.js
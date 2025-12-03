<template>

    <ColorPicker ref="colorPicker" @changeColor="newColorSelected"></ColorPicker>
    <div id="gridElement">
        <!-- Row element -->
        <div v-for="(pixelRow, pixelRowIndex) in pixels" class="grid-row">
            <!-- Column element -->
            <div  
                v-for="(pixelColumn, pixelColumnIndex) in pixelRow" 
                class="grid-item"
                :style="{ backgroundColor: pixelColumn['color'] }"
                @click="selectPixel($event)" 
                :data-row="pixelColumn['pos_x']" 
                :data-column="pixelColumn['pos_y']"
                >

            </div>
        </div>
    </div>
</template>

<script>
    import PixelData from '@/classes/PixelData.js';
    import ColorPicker from '@/components/ColorPicker.vue';

    const PIXEL_CHANGE_API = "https://pixeldraw-backend.azurewebsites.net/api/pixels/pixelChange?"

    // Pixel API:
    // https://frontend-development-api.azurewebsites.net/API/pixelDraw/pixelData.json

    export default {
        components: {
            ColorPicker
        },
        emits: ['loadingupdate'],
        data() 
            {
            return {
                pixels: [
                ],
                colorPickerVisible: false,
                currentSelectedPixel: "",
            }
        },
        methods: {
            /*
                Retrieve the Pixel Data from the API
            */
            async newColorSelected(color){
                // Set the new color to the currently selected pixel
                this.currentSelectedPixel.color = color;

                // WHat to send to the API?
                const data = this.currentPixel

                // Create the PUT params (as GET params though :( )
                let urlWithParams = PIXEL_CHANGE_API + new URLSearchParams({
                    pos_x: this.currentSelectedPixel.pos_x,
                    pos_y: this.currentSelectedPixel.pos_y,
                    color: this.currentSelectedPixel.color
                })
                
                // Send this pixel to the API!
                const response = await fetch(urlWithParams, {method: 'PUT'})
                .then( (data) => {
                    console.log("PUT success:", data);
                })
                .catch( (error) => {
                    console.error(error);
                })

                // Hide the ColorPicker
                this.$refs.colorPicker.hideColorPicker()
            },
            getPixelData() {
                // Show the loadingscreen
                this.$emit('loadingupdate', true)
                fetch("https://pixeldraw-backend.azurewebsites.net/api/pixels")
                .then( (respons) => respons.json() )
                .then( (pixelData) => { 
                    this.pixels = pixelData;

                    // Hide the loadingscreen
                    this.$emit('loadingupdate', false)  
                }).catch( (response) => {
                    console.error("Internal JSON handling error: ", response)
                    
                });
            },
            selectPixel(event) {
                let element = event.target

                let row = element.dataset.row
                let column = element.dataset.column

                // Set the selected Pixel as the currentSelectedPixel
                this.currentSelectedPixel = this.pixels[row][column];

                // Show the ColorPicker
                this.$refs.colorPicker.showColorPicker(this.currentSelectedPixel.color)

                console.info("Clicked: ", this.currentSelectedPixel)
            }
        },
        mounted() 
        {
            // Load the Pixedlata from the API and store it
            this.getPixelData();
        }       
    }
</script>

<style>

    html, body {
        margin:0px;
        overflow:hidden;
    }

    /* 
        Grid Styling
    */
    #gridElement {
        background-color: red;
        height: 100vh;
        width: 100vw;
        margin:0;
        display: flex;
        flex-direction: column;
        
    }

    .grid-row {
        display: flex;
        flex-wrap: nowrap;
        flex: 1;
    }

    .grid-item {
        flex: 1;
        
    }
    .grid-item:hover {
        box-sizing:border-box;
        box-shadow: 0px 0px 0px 4px black;
        z-index: 999;
        cursor: crosshair;
    }

    .pixelSelected {
        box-shadow: inset 0px 0px 0px 3px #f00;
    }

</style>
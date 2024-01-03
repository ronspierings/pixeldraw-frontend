<template>

    <ColorPicker></ColorPicker>

    <div id="gridElement">
        <!-- Row element -->
        <div v-for="(pixelRow, pixelRowIndex) in pixels" class="grid-row">
            <!-- Column element -->
            <div  
                v-for="(pixelColumn, pixelColumnIndex) in pixelRow" 
                class="grid-item"
                :style="{ backgroundColor: pixelColumn._color }"
                @click="selectPixel($event)" 
                :data-row="pixelRowIndex" 
                :data-column="pixelColumnIndex"
                >

            </div>
        </div>
    </div>
</template>

<script>
    import PixelData from '@/classes/PixelData.js';

    // Pixel API:
    // https://frontend-development-api.azurewebsites.net/API/pixelDraw/pixelData.json

    export default {
        data () 
            {
            return {
                pixels: [
                ]
            }
        },
        methods: {
            /*
                Retrieve the Pixel Data from the API
            */
            getPixelData() {
                fetch("https://frontend-development-api.azurewebsites.net/API/pixelDrawer/pixelData.json")
                .then( (respons) => respons.json() )
                .then( (pixelData) => { 
                    this.pixels = pixelData;        
                }).catch( (response) => {
                    
                });
            },
            selectPixel(event) {
                let element = event.target

                let row = element.dataset.row
                let column = element.dataset.column
                let currentPixel =  this.pixels[row][column];

                // Set the ColorPicker correctly
                document.getElementById("colorSelectElement").classList.remove("elementHiddenClass")
                
                document.getElementById("colorInputElement").value = currentPixel._color
                document.getElementById("colorInputElement").click()

                console.warn("Clicked: ", currentPixel)


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
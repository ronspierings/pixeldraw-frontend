<template>

    <div class="colorSelectElement">
        <input type="color" name="colorInput">
    </div>

    <v-container class="fill-height bg-red pixelGrid" fluid no-gutters>
        
        <v-responsive width="100%"></v-responsive>

        <!-- The ROW element -->
        <v-row v-for="(pixelRow, pixelRowIndex) in pixels">
            <!-- The Column element -->
            <v-col v-for="(pixelColumn, pixelColumnIndex) in pixelRow" class="pixel" @click="selectPixel($event)" :data-row="pixelRowIndex" :data-column="pixelColumnIndex" fluid :style="{ backgroundColor: pixelColumn._color }">
                
            </v-col>
        </v-row>
    </v-container>
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
            fillMockData() {
                // Generate 512 rows
                for(let row = 0; row < 32; row++)
                {
                    // Create new row
                    this.pixels[row] = [];

                    for(let column = 0; column < 32; column++)
                    {
                        // Add new column on this row, with a random Color
                        this.pixels[row].push( new PixelData("#CCCCCC") );
                    }
                }
            },
            getPixelData() {
                fetch("https://frontend-development-api.azurewebsites.net/API/pixelDrawer/pixelData.json")
                .then( (respons) => respons.json() )
                .then( (pixelData) => { 
                    
                    this.pixels = [];
                    for(let [rowIndex, rowData] in pixelData)
                    {
                        console.log(rowIndex, rowData);

                        for(let columnData in rowData)
                        {

                        }
                    }           
                })
            },
            selectPixel(event) {
                let element = event.target

                let row = element.dataset.row;
                let column = element.dataset.column;

            }
        },
        mounted() 
        {
            this.fillMockData();

            this.getPixelData();
        }       
    }
</script>

<style>

    .pixelGrid {
        box-sizing: border-box;
    }

    .pixel {

    }

    .pixelSelected {
        box-shadow: inset 0px 0px 0px 3px #f00;
    }

    .colorSelectElement {
        display: none;
    }
</style>
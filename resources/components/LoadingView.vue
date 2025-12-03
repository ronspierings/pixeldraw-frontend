<template>
  <v-dialog v-model="isLoading" fullscreen full-width>
    <v-container class="fill-height" fluid fill-height style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px);">
      <v-layout justify-center align-center>
        <v-progress-circular
          indeterminate
          color="primary"
          size="122"
          width="16"
          style="margin-right: auto; margin-left: auto"
          >
          </v-progress-circular>
      </v-layout>
    </v-container>
  </v-dialog>
</template>


<script>

  export default {
    data() {
      return {
        isLoading: false
      }
    },
    methods: {
        handleLoadingUpdate(newValue) {
          this.isLoading = newValue;
        },        
    },
    mounted() 
    {
        // Load the Pixedlata from the API and store it
        // this.getPixelData();
    }
  }  
</script>

<style scoped>
.fill-height {
  height: 100%;
}
  .loading-view {
    filter: blur(1.5rem);
    position: fixed;
    top: 50%;
    left: 0%;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Ensure it's on top of other elements */
    background-color: green;
  }
  
  .loading-icon {
    color: #3f577f; /* Adjust color as needed */
    background-color: red;

  }

</style>
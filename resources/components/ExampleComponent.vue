<template>
    <LoadingView ref="loadingViewRef" @loadingupdate="handleLoadingUpdate" ></LoadingView>
    <GridView @loadingupdate="handleLoadingUpdate"></GridView>
  </template>
    
  <script>
    
    import GridView from './GridView.vue'
    import LoadingView from './LoadingView.vue'
  
    export default {
      components: {
        LoadingView, GridView
      },
      methods: {
        handleLoadingUpdate(newValue)
        {
          this.$refs.loadingViewRef.handleLoadingUpdate(newValue)
          console.log("Handle Update!")
        }
      }
    }
  
  </script>
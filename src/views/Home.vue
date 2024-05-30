<template>  
  <LoadingView ref="loadingViewRef" @loadingupdate="handleLoadingUpdate" ></LoadingView>
  <GridView @loadingupdate="handleLoadingUpdate"></GridView>
</template>

<script>
  
  import GridView from '@/components/GridView.vue'
  import LoadingView from '@/components/LoadingView.vue'

  export default {
    components: {
      LoadingView, GridView
    },
    methods: {
      handleLoadingUpdate(newValue)
      {
        this.$refs.loadingViewRef.handleLoadingUpdate(newValue)
      }
    }
  }

</script>

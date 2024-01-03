<template>
    <div id="colorSelectElement" class="elementHiddenClass">
      <button :style="{ backgroundColor: '#F44336' }" @click="setColor('#F44336')">Red</button>
      <button :style="{ backgroundColor: '#E91E63' }" @click="setColor('#E91E63')">Pink</button>
      <button :style="{ backgroundColor: '#9C27B0' }" @click="setColor('#9C27B0')">Purple</button>
      <button :style="{ backgroundColor: '#673AB7' }" @click="setColor('#673AB7')">Deep Purple</button>
      <button :style="{ backgroundColor: '#3F51B5' }" @click="setColor('#3F51B5')">Indigo</button>
      <button :style="{ backgroundColor: '#2196F3' }" @click="setColor('#2196F3')">Blue</button>
      <button :style="{ backgroundColor: '#03A9F4' }" @click="setColor('#03A9F4')">Light Blue</button>
      <button :style="{ backgroundColor: '#00BCD4' }" @click="setColor('#00BCD4')">Cyan</button>
      <button :style="{ backgroundColor: '#009688' }" @click="setColor('#009688')">Teal</button>
      <button :style="{ backgroundColor: '#4CAF50' }" @click="setColor('#4CAF50')">Green</button>
      <button :style="{ backgroundColor: '#8BC34A' }" @click="setColor('#8BC34A')">Lime</button>
      <button :style="{ backgroundColor: '#CDDC39' }" @click="setColor('#CDDC39')">Yellow</button>
      <button :style="{ backgroundColor: '#FFEB3B' }" @click="setColor('#FFEB3B')">Amber</button>
      <button :style="{ backgroundColor: '#FFC107' }" @click="setColor('#FFC107')">Orange</button>
      <button :style="{ backgroundColor: '#FF9800' }" @click="setColor('#FF9800')">Deep Orange</button>
      <button :style="{ backgroundColor: '#FF5722' }" @click="setColor('#FF5722')">Brown</button>
      <button :style="{ backgroundColor: '#D50000' }" @click="setColor('#D50000')">Red</button>

      <input type="color" name="colorInput" id="colorInputElement">

    </div>
  </template>
  
  <script>
  export default {
    methods: {
      setColor(color) {
        this.$emit('changeColor', color);
      }
    }
  };
  </script>

<style>

    /* 
        Color Picker Styling 
    */
    #colorSelectElement
    {
        position: absolute;


        padding: 15px;
        border-radius: 10px;
        background-color: ivory;
        bottom: 10vh;
        width: 50vw;
        
    }

    .elementHiddenClass {
        display:none;
    }



</style>
  
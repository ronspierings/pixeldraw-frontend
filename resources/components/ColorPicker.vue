<template>
  <div id="colorSelectElement" v-if="colorPickerVisible">
    <p>Select a color</p>
    <button :style="{ backgroundColor: '#F44336' }" @click="setColor('#F44336')"></button>
    <button :style="{ backgroundColor: '#E91E63' }" @click="setColor('#E91E63')"></button>
    <button :style="{ backgroundColor: '#9C27B0' }" @click="setColor('#9C27B0')"></button>
    <button :style="{ backgroundColor: '#673AB7' }" @click="setColor('#673AB7')"></button>
    <button :style="{ backgroundColor: '#3F51B5' }" @click="setColor('#3F51B5')"></button>
    <button :style="{ backgroundColor: '#2196F3' }" @click="setColor('#2196F3')"></button>
    <button :style="{ backgroundColor: '#03A9F4' }" @click="setColor('#03A9F4')"></button>
    <button :style="{ backgroundColor: '#00BCD4' }" @click="setColor('#00BCD4')"></button>
    <button :style="{ backgroundColor: '#009688' }" @click="setColor('#009688')"></button>
    <button :style="{ backgroundColor: '#4CAF50' }" @click="setColor('#4CAF50')"></button>
    <button :style="{ backgroundColor: '#8BC34A' }" @click="setColor('#8BC34A')"></button>
    <button :style="{ backgroundColor: '#CDDC39' }" @click="setColor('#CDDC39')"></button>
    <button :style="{ backgroundColor: '#FFEB3B' }" @click="setColor('#FFEB3B')"></button>
    <button :style="{ backgroundColor: '#FFC107' }" @click="setColor('#FFC107')"></button>
    <button :style="{ backgroundColor: '#FF9800' }" @click="setColor('#FF9800')"></button>
    <button :style="{ backgroundColor: '#FF5722' }" @click="setColor('#FF5722')"></button>
    <button :style="{ backgroundColor: '#D50000' }" @click="setColor('#D50000')"></button>

    <input type="color" name="colorInput" id="colorInputElement" v-model="color">
  </div>
</template>
  
  <script>
    export default {
      methods: {
        // User selected a new color
        setColor(newColor) {
          this.color = newColor
          this.$emit('changeColor', this.color);

          // Do put request
        },
        showColorPicker(color) {
          // Show this DIV
          this.colorPickerVisible = true          

          // Set the currentColor
          this.color = color;
        },
        hideColorPicker() 
        {
          colorSelectElement.classList.add("fade-green")
          
          //this.colorPickerVisible = false
          console.log("Hide!")
        }
      },
      data() {      
        return {
            colorPickerVisible: false,
            color: "#CCC"
        }    
      }
    }
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
        opacity: 0.90;       
    }

    #colorSelectElement button, input {
      width: 35px;
      height: 35px;
      margin: 1px;
      border: 1px solid black;
    }

    #colorSelectElement input {
      margin-left:25px;
      height: 50px;
      width: 45px;
      padding:3px;
      border:none;
    }

    .fade-green {
      /* Initial green color */
      background-color: green !important;
      opacity: 1 !important;  /* Initially invisible */
      animation: fade-in-out 2s ease-in-out;  /* Animation name, duration, and timing function */
      animation-fill-mode: forwards;  /* Keep the final state after animation */
    }

    @keyframes fade-in-out {
      from { opacity: 0; }  /* Start invisible */
      to { opacity: 1; }  /* Fade to fully visible at 100% */
    }

</style>
  
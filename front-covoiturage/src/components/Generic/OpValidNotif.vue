<template>
    <div v-if="isVisible" class="notification" :class="{ 'success': type === 'success' }">
        <span>{{ message }}</span>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      message: {
        type: String,
        required: true
      },
      type: {
        type: String,
        default: 'success'
      },
      duration: {
        type: Number,
        default: 3000 // 3 seconds by default
      }
    },
    data() {
      return {
        isVisible: false
      };
    },
    mounted() {
      this.showNotification();
    },
    methods: {
      showNotification() {
        this.isVisible = true;
  
        // Automatically hide the notification after a certain duration
        setTimeout(() => {
          this.isVisible = false;
        }, this.duration);
      }
    }
  };
  </script>
  
  <style scoped>
  .notification {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #4caf50;
    color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    z-index: 1000;
  }
  
  .notification.success {
    background-color: #4caf50; /* Green background */
  }
  </style>
  
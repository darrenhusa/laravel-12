    <!-- resources/js/Components/MyComponent.vue -->
    <template>
      <div>
        <h1>Hello from MyComponent!</h1>
        <p>{{ message }}</p>
      </div>
    </template>

    <script>
    export default {
      data() {
        return {
          message: 'This is a Vue 3 SFC in Laravel.'
        };
      }
    };
    </script>

    <style scoped>
    div {
      background-color: #f0f0f0;
      padding: 20px;
      border-radius: 8px;
    }
    </style>
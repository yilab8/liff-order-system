<template>
  <div>
    <h1>Welcome to LIFF Order System</h1>
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-md-8">
          <div class="d-grid gap-3">
            <button @click="goToMenu" class="btn btn-primary btn-lg">
              <i class="fas fa-utensils me-2"></i>查看菜單
            </button>

            <button class="btn btn-secondary btn-lg" disabled>
              <i class="fas fa-user me-2"></i>會員資料
            </button>

            <button class="btn btn-secondary btn-lg" disabled>
              <i class="fas fa-history me-2"></i>歷史訂單
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LiffOrderSystem',
  methods: {
    goToMenu() {
      window.location.href = '/menu';
    }
  }
}
</script>

<style scoped>
</style>

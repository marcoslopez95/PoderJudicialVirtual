<template>
  <footer class="footer">
    <div class="container @auth-fluid @endauth">
        <nav>
            <ul class="footer-menu">
               
            </ul>
            <p class="copyright text-center">
                ©
                {{date}}
                Marcos M. López
            </p>
        </nav>
    </div>
</footer>
</template>

<script>
export default {
    data(){
        return {
            date: 2022
        }
    }
}
</script>

<style>

</style>
<template>
    <div>
        <div class="dashboard_bar">
            <div v-if="$route.path == '/mainpage'">
                Dashboard
            </div>
            <div v-else-if="$route.path == '/crudpage'  ">
                My Admin
            </div>
            <div v-else-if="$route.path == '/socialpage' || $route.path == '/bookmark'">
                My Social
            </div>
            <div v-else-if="$route.path == '/profile'">
                Profile
            </div>           
        </div>
    </div>    
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
            
        }        
    }

</script>

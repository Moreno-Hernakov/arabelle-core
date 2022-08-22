<template>
    <div class="dlabnav">
		<div class="dlabnav-scroll">
			<ul class="metismenu" v-if="e.role == 'admin'" v-for="e in userAuth">
				<li>
					<router-link to="/mainpage" class="" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="nav-text">Dashboard</span>
					</router-link>
				</li>
			</ul>
			<ul class="metismenu" id="menu">
			
				<li>
					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-camera"></i>
						<span class="nav-text">My Social</span>
					</a>
					<ul aria-expanded="false">
						<li>
							<!-- <a href="table-bootstrap-basic.html">Bootstrap</a> -->
							<router-link to="/socialpage">Home Page</router-link>
						</li>
						<li>
							<!-- <a href="table-bootstrap-basic.html">Bootstrap</a> -->
							<router-link to="/bookmark">bookmark</router-link>
						</li>
					</ul>
				</li>
				
			</ul>
			<ul class="metismenu" >
				<li>
					<router-link to="/profile" class="" aria-expanded="false">
							<i class="fas fa-user"></i>
							<span class="nav-text">Profile</span>
					</router-link>
				</li>
			</ul>				
			
			<div class="copyright">
				<p>© 2021 All Rights Reserved</p>
				
			</div>
		</div>		
	</div>
</template>


<script>
    export default {
		// components: {
		// 	adminUl: `	<li>
		// 					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
		// 						<i class="fas fa-home"></i>
		// 						<span class="nav-text">Dashboard</span>
		// 					</a>
		// 					<ul aria-expanded="false">
		// 						<li>
		// 							<router-link to="/mainpage">Main Page</router-link>
		// 						</li>
		// 					</ul>
		// 				</li>
		// 				<li>
		// 					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
		// 						<i class="fas fa-table"></i>
		// 						<span class="nav-text">My Admin</span>
		// 					</a>
		// 					<ul aria-expanded="false">
		// 						<li>
		// 							<!-- <a href="table-bootstrap-basic.html">Bootstrap</a> -->
		// 							<router-link to="/crudpage">Crud Page</router-link>
		// 						</li>
		// 					</ul>
		// 				</li>
		// 			`
		// },
		data() {
            return {
                userAuth: []
			}
		},
        mounted() {
            console.log('Component mounted.')
			var access_token = localStorage.getItem("access_token")
            axios.defaults.headers.common['Authorization'] = `Bearer ${access_token}` 
            this.getAuth()
        },
		methods: {
			 getAuth(){
                axios.get('api/auth')
                .then(res => {
                    this.userAuth = res.data
                    console.log(res.data)                                            
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            }
		}
        
    }
</script>
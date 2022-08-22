<template>
    
		<div class="dlabnav-scroll">
			<ul class="metismenu " id="menu ">
				<li >
					<a class="has-arrow " href="javascript:void() " aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="nav-text">Dashboard</span>
					</a>
					<ul aria-expanded="false">
						<li>
							<router-link to="/mainpage">Main Page</router-link>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-table"></i>
						<span class="nav-text">My Admin</span>
					</a>
					<ul aria-expanded="false">
						<li>
							<!-- <a href="table-bootstrap-basic.html">Bootstrap</a> -->
							<router-link to="/crudpage">Crud Page</router-link>
						</li>
					</ul>
				</li>
			
				<li>
					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-user"></i>
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
							<i class="fas fa-user-check"></i>
							<span class="nav-text">Profile</span>
					</router-link>
				</li>
			</ul>				
			
			<div class="copyright">
				<p>© 2021 All Rights Reserved</p>
				
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
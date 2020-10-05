<template>
    <div class="container">
       <div class="section">
         <nav>
            <div class="nav-wrapper">
              <a href="#!" class="brand-logo">Logo</a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><router-link :to="{ name: 'subject' }" class="nav-link" >Subject</router-link></li>
                <li><router-link :to="{ name: 'topic' }" class="nav-link">Topic</router-link></li>
                <li> <router-link :to="{ name: 'question' }" class="nav-link" >Question</router-link></li>
                <li> <router-link :to="{ name: 'objective' }" class="nav-link" >Objective</router-link></li>
                <li> <router-link :to="{ name: 'dashboard' }" class="nav-link" >Dashboard</router-link></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                  <li><router-link :to="{ name: 'subject' }" class="nav-link" >Subject</router-link></li>
                  <li><router-link :to="{ name: 'topic' }" class="nav-link">Topic</router-link></li>
                  <li> <router-link :to="{ name: 'question' }" class="nav-link" >Question</router-link></li>
                  <li> <router-link :to="{ name: 'objective' }" class="nav-link" >Objective</router-link></li>
                  <li> <router-link :to="{ name: 'dashboard' }" class="nav-link" >Dashboard</router-link></li>
              </ul>
           </div>
      </nav>
       </div>
            <main>
              
              <router-view></router-view>
          </main>
            
    </div>
</template>


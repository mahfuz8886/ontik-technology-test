<div id="layoutSidenav_nav">
     <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
         <div class="sb-sidenav-menu">
             <div class="nav">
                 <div class="sb-sidenav-menu-heading">Core</div>
                 <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                     Dashboard
                 </a>
                 <div class="sb-sidenav-menu-heading"> Interface </div>
                 
                 
                
                
                <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ route('products') }}">
                    <div class="sb-nav-link-icon"><i class="fa-brands fa-product-hunt"></i></div>
                    Products 
                </a>

                {{-- <a class="nav-link {{ Request::is('generate/affiliate/link') ? 'active' : '' }}" href="{{ route('generate_link') }}">
                    <div class="sb-nav-link-icon"><i class="fa-brands fa-affiliatetheme"></i></div>
                    Generate Affiliate Link
                </a> --}}
                 
             </div>
         </div>
         <div class="sb-sidenav-footer">
             <div class="small">Logged in as:</div>
             Start Bootstrap
         </div>
     </nav>
 </div>

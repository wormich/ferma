<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кабинет ресторатора");
?>
<?if($USER->IsAuthorized()):?>
<aside class="sidebar sidebar-default sidebar-hover sidebar-mini navs-pill-all ">

    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="navbar-collapse" id="sidebar">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#home" role="button" aria-expanded="false" aria-controls="home">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="home" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../dashboard/index.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U</i>
                                <span class="item-name">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../dashboard/admin-dashboard.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">A </i>
                                <span class="item-name">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/restaurant-dashboard.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">R </i>
                                <span class="item-name">Restaurant</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Pages</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special" role="button" aria-expanded="false" aria-controls="sidebar-special">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M13.3051 5.88243V6.06547C12.8144 6.05584 12.3237 6.05584 11.8331 6.05584V5.89206C11.8331 5.22733 11.2737 4.68784 10.6064 4.68784H9.63482C8.52589 4.68784 7.62305 3.80152 7.62305 2.72254C7.62305 2.32755 7.95671 2 8.35906 2C8.77123 2 9.09508 2.32755 9.09508 2.72254C9.09508 3.01155 9.34042 3.24276 9.63482 3.24276H10.6064C12.0882 3.2524 13.2953 4.43736 13.3051 5.88243Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.164 6.08279C15.4791 6.08712 15.7949 6.09145 16.1119 6.09469C19.5172 6.09469 22 8.52241 22 11.875V16.1813C22 19.5339 19.5172 21.9616 16.1119 21.9616C14.7478 21.9905 13.3837 22.0001 12.0098 22.0001C10.6359 22.0001 9.25221 21.9905 7.88813 21.9616C4.48283 21.9616 2 19.5339 2 16.1813V11.875C2 8.52241 4.48283 6.09469 7.89794 6.09469C9.18351 6.07542 10.4985 6.05615 11.8332 6.05615C12.3238 6.05615 12.8145 6.05615 13.3052 6.06579C13.9238 6.06579 14.5425 6.07427 15.164 6.08279ZM10.8518 14.7459H9.82139V15.767C9.82139 16.162 9.48773 16.4896 9.08538 16.4896C8.67321 16.4896 8.34936 16.162 8.34936 15.767V14.7459H7.30913C6.90677 14.7459 6.57311 14.4279 6.57311 14.0233C6.57311 13.6283 6.90677 13.3008 7.30913 13.3008H8.34936V12.2892C8.34936 11.8942 8.67321 11.5667 9.08538 11.5667C9.48773 11.5667 9.82139 11.8942 9.82139 12.2892V13.3008H10.8518C11.2542 13.3008 11.5878 13.6283 11.5878 14.0233C11.5878 14.4279 11.2542 14.7459 10.8518 14.7459ZM15.0226 13.1177H15.1207C15.5231 13.1177 15.8567 12.7998 15.8567 12.3952C15.8567 12.0002 15.5231 11.6727 15.1207 11.6727H15.0226C14.6104 11.6727 14.2866 12.0002 14.2866 12.3952C14.2866 12.7998 14.6104 13.1177 15.0226 13.1177ZM16.7007 16.4318H16.7988C17.2012 16.4318 17.5348 16.1139 17.5348 15.7092C17.5348 15.3143 17.2012 14.9867 16.7988 14.9867H16.7007C16.2885 14.9867 15.9647 15.3143 15.9647 15.7092C15.9647 16.1139 16.2885 16.4318 16.7007 16.4318Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Special Pages</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-special" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/dish-detail.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">D </i>
                                <span class="item-name">Dish detail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/add-to-cart.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon">A </i>
                                <span class="item-name">Add To cart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/order-history.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> O </i>
                                <span class="item-name">Order History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/order-detail.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> O </i>
                                <span class="item-name">Order Detail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/menu.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> M </i>
                                <span class="item-name">Menu</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/customer-review.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> C </i>
                                <span class="item-name">Costumer Review</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/special-pages/restaurant-detail.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> R </i>
                                <span class="item-name">restaurant Detail</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth" role="button" aria-expanded="false" aria-controls="sidebar-user">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z" fill="currentColor"></path>
                                <path d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Authentication</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-auth" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard/auth/sign-in.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> L </i>
                                <span class="item-name">Login</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard/auth/sign-up.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> R </i>
                                <span class="item-name">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard/auth/confirm-mail.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> C </i>
                                <span class="item-name">Confirm Mail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard/auth/recoverpw.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> R </i>
                                <span class="item-name">Recover password</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Users</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/app/user-profile.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">User Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/app/user-add.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> A </i>
                                <span class="item-name">Add User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/app/user-list.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">User List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#utilities-error" role="button" aria-expanded="false" aria-controls="utilities-error">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M11.9912 18.6215L5.49945 21.864C5.00921 22.1302 4.39768 21.9525 4.12348 21.4643C4.0434 21.3108 4.00106 21.1402 4 20.9668V13.7087C4 14.4283 4.40573 14.8725 5.47299 15.37L11.9912 18.6215Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.89526 2H15.0695C17.7773 2 19.9735 3.06605 20 5.79337V20.9668C19.9989 21.1374 19.9565 21.3051 19.8765 21.4554C19.7479 21.7007 19.5259 21.8827 19.2615 21.9598C18.997 22.0368 18.7128 22.0023 18.4741 21.8641L11.9912 18.6215L5.47299 15.3701C4.40573 14.8726 4 14.4284 4 13.7088V5.79337C4 3.06605 6.19625 2 8.89526 2ZM8.22492 9.62227H15.7486C16.1822 9.62227 16.5336 9.26828 16.5336 8.83162C16.5336 8.39495 16.1822 8.04096 15.7486 8.04096H8.22492C7.79137 8.04096 7.43991 8.39495 7.43991 8.83162C7.43991 9.26828 7.79137 9.62227 8.22492 9.62227Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Utilities</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="utilities-error" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/errors/error404.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> E </i>
                                <span class="item-name">Error 404</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/errors/error500.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> E </i>
                                <span class="item-name">Error 500</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/errors/maintenance.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> M </i>
                                <span class="item-name">Maintence</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Elements</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui" role="button" aria-expanded="false" aria-controls="utilities-error">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M2 11.0786C2.05 13.4166 2.19 17.4156 2.21 17.8566C2.281 18.7996 2.642 19.7526 3.204 20.4246C3.986 21.3676 4.949 21.7886 6.292 21.7886C8.148 21.7986 10.194 21.7986 12.181 21.7986C14.176 21.7986 16.112 21.7986 17.747 21.7886C19.071 21.7886 20.064 21.3566 20.836 20.4246C21.398 19.7526 21.759 18.7896 21.81 17.8566C21.83 17.4856 21.93 13.1446 21.99 11.0786H2Z" fill="currentColor"></path>                                <path d="M11.2451 15.3843V16.6783C11.2451 17.0923 11.5811 17.4283 11.9951 17.4283C12.4091 17.4283 12.7451 17.0923 12.7451 16.6783V15.3843C12.7451 14.9703 12.4091 14.6343 11.9951 14.6343C11.5811 14.6343 11.2451 14.9703 11.2451 15.3843Z" fill="currentColor"></path>                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.211 14.5565C10.111 14.9195 9.762 15.1515 9.384 15.1015C6.833 14.7455 4.395 13.8405 2.337 12.4815C2.126 12.3435 2 12.1075 2 11.8555V8.38949C2 6.28949 3.712 4.58149 5.817 4.58149H7.784C7.972 3.12949 9.202 2.00049 10.704 2.00049H13.286C14.787 2.00049 16.018 3.12949 16.206 4.58149H18.183C20.282 4.58149 21.99 6.28949 21.99 8.38949V11.8555C21.99 12.1075 21.863 12.3425 21.654 12.4815C19.592 13.8465 17.144 14.7555 14.576 15.1105C14.541 15.1155 14.507 15.1175 14.473 15.1175C14.134 15.1175 13.831 14.8885 13.746 14.5525C13.544 13.7565 12.821 13.1995 11.99 13.1995C11.148 13.1995 10.433 13.7445 10.211 14.5565ZM13.286 3.50049H10.704C10.031 3.50049 9.469 3.96049 9.301 4.58149H14.688C14.52 3.96049 13.958 3.50049 13.286 3.50049Z" fill="currentColor">
                                </path></svg>
                        </i>
                        <span class="item-name">UI Elements</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="ui"  data-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-avatars.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> A</i>
                                <span class="item-name">Avatars</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-alerts.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> A </i>
                                <span class="item-name">Alerts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-badges.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> B </i>
                                <span class="item-name">Badge</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-breadcrumb.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> B </i>
                                <span class="item-name">Breadcrumb</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-buttons.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> B </i>
                                <span class="item-name">Buttons</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-buttons-group.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> B </i>
                                <span class="item-name">Buttons Group</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-boxshadow.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> B </i>
                                <span class="item-name">Box Shadow</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-color.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> C</i>
                                <span class="item-name">Colors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-cards.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> C </i>
                                <span class="item-name">Cards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-carousel.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> C </i>
                                <span class="item-name">Carousel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-grid.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> G </i>
                                <span class="item-name">Grid</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-helper-classes.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name">Helper classes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-images.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> I </i>
                                <span class="item-name">Images</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-list-group.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> L </i>
                                <span class="item-name">List Group</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-modal.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> M </i>
                                <span class="item-name">Modal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-notifications.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> N </i>
                                <span class="item-name">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-pagination.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> P </i>
                                <span class="item-name">Pagination</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-popovers.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> P </i>
                                <span class="item-name">Popovers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-typography.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> T </i>
                                <span class="item-name">Typography</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-tabs.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> T </i>
                                <span class="item-name">Tabs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-tooltips.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> T </i>
                                <span class="item-name">Tooltips</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/ui-elements/ui-embed-video.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> V </i>
                                <span class="item-name">Video</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-widget" role="button" aria-expanded="false" aria-controls="sidebar-widget">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M21.25 13.4764C20.429 13.4764 19.761 12.8145 19.761 12.001C19.761 11.1865 20.429 10.5246 21.25 10.5246C21.449 10.5246 21.64 10.4463 21.78 10.3076C21.921 10.1679 22 9.97864 22 9.78146L21.999 7.10415C21.999 4.84102 20.14 3 17.856 3H6.144C3.86 3 2.001 4.84102 2.001 7.10415L2 9.86766C2 10.0648 2.079 10.2541 2.22 10.3938C2.36 10.5325 2.551 10.6108 2.75 10.6108C3.599 10.6108 4.239 11.2083 4.239 12.001C4.239 12.8145 3.571 13.4764 2.75 13.4764C2.336 13.4764 2 13.8093 2 14.2195V16.8949C2 19.158 3.858 21 6.143 21H17.857C20.142 21 22 19.158 22 16.8949V14.2195C22 13.8093 21.664 13.4764 21.25 13.4764Z" fill="currentColor"></path>
                                <path d="M15.4303 11.5887L14.2513 12.7367L14.5303 14.3597C14.5783 14.6407 14.4653 14.9177 14.2343 15.0837C14.0053 15.2517 13.7063 15.2727 13.4543 15.1387L11.9993 14.3737L10.5413 15.1397C10.4333 15.1967 10.3153 15.2267 10.1983 15.2267C10.0453 15.2267 9.89434 15.1787 9.76434 15.0847C9.53434 14.9177 9.42134 14.6407 9.46934 14.3597L9.74734 12.7367L8.56834 11.5887C8.36434 11.3907 8.29334 11.0997 8.38134 10.8287C8.47034 10.5587 8.70034 10.3667 8.98134 10.3267L10.6073 10.0897L11.3363 8.61268C11.4633 8.35868 11.7173 8.20068 11.9993 8.20068H12.0013C12.2843 8.20168 12.5383 8.35968 12.6633 8.61368L13.3923 10.0897L15.0213 10.3277C15.2993 10.3667 15.5293 10.5587 15.6173 10.8287C15.7063 11.0997 15.6353 11.3907 15.4303 11.5887Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">widget</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-widget" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/widget/widgetbasic.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> W </i>
                                <span class="item-name">Widget Basic</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/widget/widgetchart.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> W </i>
                                <span class="item-name">Widget Chart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/widget/widgetcard.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> W </i>
                                <span class="item-name">Widget Card</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-maps" role="button" aria-expanded="false" aria-controls="sidebar-maps">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53162 2.93677C10.7165 1.66727 13.402 1.68946 15.5664 2.99489C17.7095 4.32691 19.012 6.70418 18.9998 9.26144C18.95 11.8019 17.5533 14.19 15.8075 16.0361C14.7998 17.1064 13.6726 18.0528 12.4488 18.856C12.3228 18.9289 12.1848 18.9777 12.0415 19C11.9036 18.9941 11.7693 18.9534 11.6508 18.8814C9.78243 17.6746 8.14334 16.134 6.81233 14.334C5.69859 12.8314 5.06584 11.016 5 9.13442C4.99856 6.57225 6.34677 4.20627 8.53162 2.93677ZM9.79416 10.1948C10.1617 11.1008 11.0292 11.6918 11.9916 11.6918C12.6221 11.6964 13.2282 11.4438 13.6748 10.9905C14.1214 10.5371 14.3715 9.92064 14.3692 9.27838C14.3726 8.29804 13.7955 7.41231 12.9073 7.03477C12.0191 6.65723 10.995 6.86235 10.3133 7.55435C9.63159 8.24635 9.42664 9.28872 9.79416 10.1948Z" fill="currentColor"></path>
                                <ellipse opacity="0.4" cx="12" cy="21" rx="5" ry="1" fill="currentColor"></ellipse>
                            </svg>
                        </i>
                        <span class="item-name">Maps</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-maps" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/maps/google.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> G </i>
                                <span class="item-name">Google</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/maps/vector.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> V </i>
                                <span class="item-name">Vector</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-form" role="button" aria-expanded="false" aria-controls="sidebar-form">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Form</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-form" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/form/form-element.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> E </i>
                                <span class="item-name">Elements</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/form/form-wizard.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> W </i>
                                <span class="item-name">Wizard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/form/form-validation.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> V </i>
                                <span class="item-name">Validation</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-table" role="button" aria-expanded="false" aria-controls="sidebar-table">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"/>
                                <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"/>
                            </svg>
                        </i>
                        <span class="item-name">Table</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-table" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/table/bootstrap-table.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> B </i>
                                <span class="item-name">Bootstrap Table</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/table/table-data.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Datatable</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mb-5 pb-5">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-icons" role="button" aria-expanded="false" aria-controls="sidebar-icons">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 10.5378C8 9.43327 8.89543 8.53784 10 8.53784H11.3333C12.4379 8.53784 13.3333 9.43327 13.3333 10.5378V19.8285C13.3333 20.9331 14.2288 21.8285 15.3333 21.8285H16C16 21.8285 12.7624 23.323 10.6667 22.9361C10.1372 22.8384 9.52234 22.5913 9.01654 22.3553C8.37357 22.0553 8 21.3927 8 20.6832V10.5378Z" fill="currentColor"/>
                                <rect opacity="0.4" x="8" y="1" width="5" height="5" rx="2.5" fill="currentColor"/>
                            </svg>
                        </i>
                        <span class="item-name">Icons</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-icons" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/icons/solid.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> S </i>
                                <span class="item-name">Solid</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/icons/outline.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> O </i>
                                <span class="item-name">Outlined</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/icons/dual-tone.html">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Dual Tone</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu End -->        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
<main class="main-content">

    <div class="content-inner mt-5 py-0">
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="card"  data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".4"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                    <div class="card-header">
                        <h4 class="card-title">Sales Figures</h4>
                        <small>2017-2018</small>
                    </div>
                    <div class="card-body"  data-iq-gsap="onStart"
                         data-iq-opacity="0"
                         data-iq-position-y="-40"
                         data-iq-duration=".6"
                         data-iq-delay=".6"
                         data-iq-trigger="scroll"
                         data-iq-ease="none">
                        <div id="admin-chart-1" class="admin-chart-1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xl-8">
                        <div class="card"  data-iq-gsap="onStart"
                             data-iq-opacity="0"
                             data-iq-position-y="-40"
                             data-iq-duration=".6"
                             data-iq-delay=".5"
                             data-iq-trigger="scroll"
                             data-iq-ease="none">
                            <div class="card-body">

                                <ul class="nav nav-tabs mb-4 nav-justified product-tab" id="myTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active text-start" id="todo-tab" data-bs-toggle="tab" data-chart="update" data-type="product" data-bs-target="#product" type="button" role="tab" aria-selected="true">Все заказы</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="customer-tab" data-bs-toggle="tab" data-chart="update" data-type="customer" data-bs-target="#customer" type="button" role="tab"  aria-selected="false">Новые клиенты</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-end" id="members-tab" data-bs-toggle="tab" data-chart="update" data-type="member" data-bs-target="#members" type="button" role="tab" aria-selected="false">Выручка</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active" id="product" role="tabpanel">

                                        <div id="admin-chart-7" class="admin-chart-7"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-4">
                        <div class="card"
                             data-iq-gsap="onStart"
                             data-iq-opacity="0"
                             data-iq-position-y="-40"
                             data-iq-duration=".6"
                             data-iq-delay=".6"
                             data-iq-trigger="scroll"
                             data-iq-ease="none">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <div class="avatar-75 mb-2 rounded bg-soft-primary text-center" style="line-height: 75px;">
                                        <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="path-1-inside-1" fill="white">
                                                <path d="M22.2652 5.05273C19.1066 5.05273 16.0066 5.91232 13.2925 7.54076C10.5783 9.16919 8.35071 11.5061 6.8448 14.3047C5.33889 17.1033 4.61054 20.2598 4.73664 23.441C4.86274 26.6222 5.83862 29.7101 7.56124 32.3787C9.28387 35.0472 11.6893 37.1975 14.5237 38.6025C17.3581 40.0075 20.5162 40.615 23.6647 40.361C26.8133 40.107 29.8353 39.0008 32.4119 37.1593C34.9885 35.3178 37.024 32.8093 38.3036 29.8985L33.7665 27.872C32.8489 29.9594 31.3892 31.7583 29.5415 33.0789C27.6938 34.3994 25.5266 35.1927 23.2688 35.3748C21.011 35.557 18.7463 35.1213 16.7137 34.1138C14.6811 33.1062 12.9561 31.5643 11.7208 29.6506C10.4855 27.7369 9.78569 25.5226 9.69526 23.2413C9.60483 20.96 10.1271 18.6964 11.207 16.6895C12.287 14.6826 13.8844 13.0068 15.8307 11.839C17.7771 10.6713 20.0001 10.0549 22.2652 10.0549V5.05273Z"/>
                                            </mask>
                                            <path d="M22.2652 5.05273C19.1066 5.05273 16.0066 5.91232 13.2925 7.54076C10.5783 9.16919 8.35071 11.5061 6.8448 14.3047C5.33889 17.1033 4.61054 20.2598 4.73664 23.441C4.86274 26.6222 5.83862 29.7101 7.56124 32.3787C9.28387 35.0472 11.6893 37.1975 14.5237 38.6025C17.3581 40.0075 20.5162 40.615 23.6647 40.361C26.8133 40.107 29.8353 39.0008 32.4119 37.1593C34.9885 35.3178 37.024 32.8093 38.3036 29.8985L33.7665 27.872C32.8489 29.9594 31.3892 31.7583 29.5415 33.0789C27.6938 34.3994 25.5266 35.1927 23.2688 35.3748C21.011 35.557 18.7463 35.1213 16.7137 34.1138C14.6811 33.1062 12.9561 31.5643 11.7208 29.6506C10.4855 27.7369 9.78569 25.5226 9.69526 23.2413C9.60483 20.96 10.1271 18.6964 11.207 16.6895C12.287 14.6826 13.8844 13.0068 15.8307 11.839C17.7771 10.6713 20.0001 10.0549 22.2652 10.0549V5.05273Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-1-inside-1)"/>
                                            <mask id="path-2-inside-2" fill="white">
                                                <path d="M39.0428 27.8871C39.8135 25.4604 40.0303 22.8867 39.6775 20.352C39.3246 17.8174 38.411 15.3851 37.0026 13.2309C35.5943 11.0767 33.7263 9.25434 31.5337 7.89561C29.3411 6.53687 26.8787 5.67564 24.3243 5.37415L23.8213 10.0957C25.6715 10.3141 27.4551 10.9379 29.0432 11.922C30.6313 12.9061 31.9843 14.2261 33.0044 15.7864C34.0245 17.3467 34.6862 19.1084 34.9418 20.9443C35.1973 22.7802 35.0403 24.6443 34.4821 26.402L39.0428 27.8871Z"/>
                                            </mask>
                                            <path d="M39.0428 27.8871C39.8135 25.4604 40.0303 22.8867 39.6775 20.352C39.3246 17.8174 38.411 15.3851 37.0026 13.2309C35.5943 11.0767 33.7263 9.25434 31.5337 7.89561C29.3411 6.53687 26.8787 5.67564 24.3243 5.37415L23.8213 10.0957C25.6715 10.3141 27.4551 10.9379 29.0432 11.922C30.6313 12.9061 31.9843 14.2261 33.0044 15.7864C34.0245 17.3467 34.6862 19.1084 34.9418 20.9443C35.1973 22.7802 35.0403 24.6443 34.4821 26.402L39.0428 27.8871Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-2-inside-2)"/>
                                            <mask id="path-3-inside-3" fill="white">
                                                <path d="M22.445 33.1201C24.3163 33.1201 26.1539 32.6185 27.7694 31.6667C29.3849 30.7149 30.7202 29.3471 31.6385 27.7037C32.5567 26.0602 33.0248 24.2001 32.9947 22.3142C32.9647 20.4283 32.4376 18.5844 31.4675 16.9714C30.4974 15.3585 29.1192 14.0347 27.4742 13.1357C25.8292 12.2366 23.9766 11.7947 22.1063 11.8553C20.236 11.9159 18.4153 12.4767 16.831 13.4803C15.2466 14.4839 13.9555 15.8942 13.0901 17.5665L16.4473 19.3316C17.0021 18.2594 17.8299 17.3552 18.8457 16.7117C19.8614 16.0683 21.0287 15.7087 22.2278 15.6699C23.427 15.6311 24.6147 15.9144 25.6694 16.4908C26.7241 17.0672 27.6077 17.916 28.2297 18.9501C28.8516 19.9841 29.1896 21.1664 29.2088 22.3755C29.2281 23.5846 28.928 24.7772 28.3393 25.8309C27.7506 26.8845 26.8944 27.7615 25.8587 28.3717C24.8229 28.9819 23.6448 29.3035 22.445 29.3035V33.1201Z"/>
                                            </mask>
                                            <path d="M22.445 33.1201C24.3163 33.1201 26.1539 32.6185 27.7694 31.6667C29.3849 30.7149 30.7202 29.3471 31.6385 27.7037C32.5567 26.0602 33.0248 24.2001 32.9947 22.3142C32.9647 20.4283 32.4376 18.5844 31.4675 16.9714C30.4974 15.3585 29.1192 14.0347 27.4742 13.1357C25.8292 12.2366 23.9766 11.7947 22.1063 11.8553C20.236 11.9159 18.4153 12.4767 16.831 13.4803C15.2466 14.4839 13.9555 15.8942 13.0901 17.5665L16.4473 19.3316C17.0021 18.2594 17.8299 17.3552 18.8457 16.7117C19.8614 16.0683 21.0287 15.7087 22.2278 15.6699C23.427 15.6311 24.6147 15.9144 25.6694 16.4908C26.7241 17.0672 27.6077 17.916 28.2297 18.9501C28.8516 19.9841 29.1896 21.1664 29.2088 22.3755C29.2281 23.5846 28.928 24.7772 28.3393 25.8309C27.7506 26.8845 26.8944 27.7615 25.8587 28.3717C24.8229 28.9819 23.6448 29.3035 22.445 29.3035V33.1201Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-3-inside-3)"/>
                                            <mask id="path-4-inside-4" fill="white">
                                                <path d="M12.5622 18.6902C11.9893 20.1253 11.7489 21.6741 11.8588 23.2226C11.9687 24.7711 12.4261 26.2798 13.1973 27.6378C13.9686 28.9957 15.0339 30.1683 16.3151 31.0692C17.5962 31.9701 19.0605 32.5763 20.6002 32.8434L21.2072 29.1137C20.2295 28.9441 19.2997 28.5591 18.4862 27.9871C17.6727 27.415 16.9961 26.6704 16.5064 25.8081C16.0167 24.9459 15.7263 23.9878 15.6565 23.0045C15.5867 22.0213 15.7393 21.0378 16.1031 20.1265L12.5622 18.6902Z"/>
                                            </mask>
                                            <path d="M12.5622 18.6902C11.9893 20.1253 11.7489 21.6741 11.8588 23.2226C11.9687 24.7711 12.4261 26.2798 13.1973 27.6378C13.9686 28.9957 15.0339 30.1683 16.3151 31.0692C17.5962 31.9701 19.0605 32.5763 20.6002 32.8434L21.2072 29.1137C20.2295 28.9441 19.2997 28.5591 18.4862 27.9871C17.6727 27.415 16.9961 26.6704 16.5064 25.8081C16.0167 24.9459 15.7263 23.9878 15.6565 23.0045C15.5867 22.0213 15.7393 21.0378 16.1031 20.1265L12.5622 18.6902Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-4-inside-4)"/>
                                        </svg>
                                    </div>
                                    <h6 class="heading-title text-center">$18 378</h6>
                                </div>
                                <div class=" text-end">
                                    <div>
                                        <h6 class="heading-title mb-5">Total Sales</h6>
                                    </div>
                                    <div class="d-flex">
                                        <div id="admin-chart-4"></div>
                                        <h6 class="heading-title text-primary">+14% <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.77083 3.54199L9.77083 16.042" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4.75213 8.58301L9.77213 3.54134L14.793 8.58301" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card"  data-iq-gsap="onStart"
                             data-iq-opacity="0"
                             data-iq-position-y="-40"
                             data-iq-duration=".6"
                             data-iq-delay=".7"
                             data-iq-trigger="scroll"
                             data-iq-ease="none">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <div class="avatar-75 mb-2 rounded bg-soft-primary text-center" style="line-height: 75px;">
                                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0316 21.7946C29.2493 21.7946 30.2714 22.7768 30.0852 23.9521C28.9929 30.8664 22.9364 36.0002 15.6319 36.0002C7.55035 36.0002 1 29.5983 1 21.7017C1 15.1958 6.05714 9.13557 11.7507 7.76533C12.9741 7.47011 14.228 8.3112 14.228 9.54219C14.228 17.8825 14.5148 20.04 16.1353 21.2134C17.7558 22.3869 19.6613 21.7946 28.0316 21.7946Z" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M35.9985 14.8492C36.0954 9.49073 29.3608 0.853355 21.1538 1.00189C20.5155 1.01303 20.0045 1.53291 19.976 2.1549C19.7689 6.56085 20.0482 12.2702 20.204 14.8585C20.2515 15.6643 20.8993 16.2974 21.7219 16.3438C24.4442 16.4961 30.4987 16.704 34.9423 16.0467C35.5464 15.9576 35.989 15.4452 35.9985 14.8492Z" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <h6 class="heading-title text-center">$18 378</h6>
                                </div>
                                <div class=" text-end">
                                    <div>
                                        <h6 class="heading-title mb-5">Total Profit</h6>
                                    </div>
                                    <div class="d-flex">
                                        <div id="admin-chart-5"></div>
                                        <h6 class="heading-title text-primary">+0.4% <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.77083 3.54199L9.77083 16.042" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4.75213 8.58301L9.77213 3.54134L14.793 8.58301" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="600"  data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay="1"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                    <div class="card-header border-0 pb-0">
                        <div class="header-title">
                            <h4 class="card-title">User List</h4>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table id="basic-table" class="table mb-0 iq-table user-list-table" role="grid">
                                <thead >
                                <tr>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Contacts</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="../assets/images/avatars/06.png" alt="profile">
                                            <p class="mb-0">Darrell Steward</p>
                                        </div>
                                    </td>
                                    <td>
                                        2715 Ash Dr. San Jose
                                    </td>
                                    <td>1234567890</td>
                                    <td>
                                        abc123@gmail.com
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="../assets/images/avatars/07.png" alt="profile">
                                            <p class="mb-0">Jane Cooper</p>
                                        </div>
                                    </td>
                                    <td>
                                        6391 Elgin St. Celina
                                    </td>
                                    <td>1234567890</td>
                                    <td>
                                        abc123@gmail.com
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="../assets/images/avatars/08.png" alt="profile">
                                            <p class="mb-0">Esther Howard</p>
                                        </div>
                                    </td>
                                    <td>
                                        2464 Royal Ln. Mesa
                                    </td>
                                    <td>1234567890</td>
                                    <td>
                                        abc123@gmail.com
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="../assets/images/avatars/09.png" alt="profile">
                                            <p class="mb-0">Jacob Jones</p>
                                        </div>
                                    </td>
                                    <td>
                                        6391 Elgin St. Celina
                                    </td>
                                    <td>1234567890</td>
                                    <td>
                                        abc123@gmail.com
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="../assets/images/avatars/10.png" alt="profile">
                                            <p class="mb-0">Jane Cooper</p>
                                        </div>
                                    </td>
                                    <td>
                                        6391 Elgin St. Celina
                                    </td>
                                    <td>1234567890</td>
                                    <td>
                                        abc123@gmail.com
                                    </td>
                                </tr>
                                <tr >
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="../assets/images/avatars/08.png" alt="profile">
                                            <p class="mb-0">Esther Howard</p>
                                        </div>
                                    </td>
                                    <td>
                                        6391 Elgin St. Celina
                                    </td>
                                    <td>1234567890</td>
                                    <td>
                                        abc123@gmail.com
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="card card-primary"  data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".8"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="col">
                            <p class="text-white mt-3 mb-4">Общая выручка</p>
                            <h2 class="text-white mb-4">4350 руб.</h2>
                            <a href="#" class="btn bg-white rounded-pill">История заказов</a>
                        </div>
                        <div class="col-2  card mb-0 bg-white card-body">
                            <img src="/upload/iblock/887/g9qp0yk2lbytbota54uq7v32u3l88mni.png">

                        </div>
                    </div>
                </div>
                <div class="card"  data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay="1"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                    <div class="card-header">
                        <h4 class="card-title">Last Transaction</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/admin/01.png" class="img-fluid rounded-pill  avatar-50" alt="1">
                                <div class="ms-3">
                                    <h6 class="heading-title fw-bolder mb-2">Sausage Pizza</h6>
                                    <p class="mb-0">20.01.2021</p>
                                </div>
                            </div>
                            <h6 class="heading-title">-$115,00</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/admin/02.png" class="img-fluid rounded-pill  avatar-50" alt="2">
                                <div class="ms-3">

                                    <h6 class="heading-title fw-bolder mb-2">Noodles</h6>
                                    <p class="mb-0">20.01.2021</p>
                                </div>
                            </div>
                            <h6 class="heading-title">-$115,00</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/admin/03.png" class="img-fluid rounded-pill  avatar-50" alt="3">
                                <div class="ms-3">
                                    <h6 class="heading-title fw-bolder mb-2">Pasta</h6>
                                    <p class="mb-0">20.01.2021</p>
                                </div>
                            </div>
                            <h6 class="heading-title">-$115,00</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/admin/04.png" class="img-fluid rounded-pill  avatar-50" alt="4">
                                <div class="ms-3">
                                    <h6 class="heading-title fw-bolder mb-2">Burger</h6>
                                    <p class="mb-0">20.01.2021</p>
                                </div>
                            </div>
                            <h6 class="heading-title">-$115,00</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/admin/05.png" class="img-fluid rounded-pill  avatar-50" alt="5">
                                <div class="ms-3">
                                    <h6 class="heading-title fw-bolder mb-2">Sausage Pizza</h6>
                                    <p class="mb-0">20.01.2021</p>
                                </div>
                            </div>
                            <h6 class="heading-title">-$115,00</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/admin/06.png" class="img-fluid rounded-pill avatar-50" alt="6">
                                <div class="ms-3">
                                    <h6 class="heading-title fw-bolder mb-2">Cheese Pizza</h6>
                                    <p class="mb-0">20.01.2021</p>
                                </div>
                            </div>
                            <h6 class="heading-title">-$115,00</h6>
                        </div>
                    </div>
                </div>

                <div class="card"  data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".9"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                    <div class="card-header">
                        <h4 class="card-title">Top Menu Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <div class="me-3">
                                <img src="../assets/images/admin/07.png" class="img-fluid rounded-pill  avatar-50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="heading-title fw-bolder">Veg Cripsy</h6>
                                    <h6 class="heading-title">67%</h6>
                                </div>
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="me-3">
                                <img src="../assets/images/admin/08.png" class="img-fluid rounded-pill  avatar-50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="heading-title fw-bolder">Paneer Chilly</h6>
                                    <h6 class="heading-title">40%</h6>
                                </div>
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="me-3">
                                <img src="../assets/images/admin/09.png" class="img-fluid rounded-pill  avatar-50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="heading-title fw-bolder">Creamy Nachos</h6>
                                    <h6 class="heading-title">90%</h6>
                                </div>
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="me-3">
                                <img src="../assets/images/admin/10.png" class="img-fluid rounded-pill  avatar-50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="heading-title fw-bolder">Veg kholapuri</h6>
                                    <h6 class="heading-title">50%</h6>
                                </div>
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="me-3">
                                <img src="../assets/images/admin/11.png" class="img-fluid rounded-pill  avatar-50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="heading-title fw-bolder">Hot and Sour soup</h6>
                                    <h6 class="heading-title">37%</h6>
                                </div>
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="../assets/images/admin/12.png" class="img-fluid rounded-pill  avatar-50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="heading-title fw-bolder">Hot and Sour soup</h6>
                                    <h6 class="heading-title">37%</h6>
                                </div>
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?else:?>

    <?
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: /personal/auth/");
        exit();
        ?>

    <?endif;?>

    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

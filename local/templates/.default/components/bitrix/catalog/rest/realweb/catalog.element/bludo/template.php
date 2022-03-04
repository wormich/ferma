<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$MENU_IBLOCK = \Realweb\Site\Site::getIblockId('menu');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="border-bottom-0 pb-0">
                <h1 class="card-title"><?= $arResult['NAME']; ?></h1>
            </div>
            <div>
                <div class="row">
                    <div class="col-lg-12 col-xl-5  mb-4 mt-xl-0">
                        <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" class="img-fluid rounded" alt="image"
                             style="height: 100%;">
                    </div>
                    <div class="col-lg-12 col-xl-7">

                        <p class="mb-4"><?= $arResult['PREVIEW_TEXT']; ?></p>

                        <button type="button" class="btn btn-primary rounded mb-4">Добавить в корзину</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6  col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Info</h4>
            </div>
            <div class="card-body">
                <ul class="list-inline list-main p-0 m-0 text-dark">
                    <li class="py-4 pt-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="heading-title">Цена</h6>
                            <h6 class="heading-title"><?=$arResult['PROPERTIES']['PRICE']['VALUE'];?></h6>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="heading-title">Product Category</h6>
                            <h6 class="heading-title">Veg</h6>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="heading-title">Availiblity</h6>
                            <span class="badge rounded-pill bg-success p-2">In stock</span>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="heading-title">Delivery Charges</h6>
                            <h6 class="heading-title">Free</h6>
                        </div>
                    </li>
                    <li class="py-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title">SKU Identification</h6>
                            <h6 class="heading-title">23445</h6>
                        </div>
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <a href="#" class="btn btn-primary rounded">Edit</a>
                    <a href="#" class="btn btn-primary rounded">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6  col-xl-4">
        <div class="card iq-glass-card rounded border border-white">
            <div class="card-header bg-transparent">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <h4>Recommendations for you</h4>
                    <div class="d-flex">
                        <a href="#" class="text-dark heading-title">View All
                            <svg width="24" height="24" class="ms-1" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" rx="12" fill="#EA6A12"></rect>
                                <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="white" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="iq-col-masonry">
                    <button type="button" class="btn btn-primary iq-col-masonry-block rounded-pill">Burgers</button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Pizza
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Soup
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Dessert
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Dessert
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Biscuits
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill"> cheese
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill"> cheese
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Tomato
                        soup
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Chicken
                        fingers
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Chicken
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">nuggets
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Flatbread
                        pizza
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Soup
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Flatbread
                        pizza
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">cheese
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Mini
                        burgers
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Mini
                        burgers
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Mini
                        pizzas
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Grilled
                        Cheese
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Grilled
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Veggie
                        Grill’s
                    </button>
                    <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill">Sandwich
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-2">Veg Burger</h4>
                <p class="mb-0">The world’s favourite US burger!</p>
            </div>
            <div class="card-body text-dark py-4">
                <table class="table table-sm table-borderless">
                    <tbody>
                    <tr class="text-primary">
                        <th>Add-ons</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </tbody>
                    <tbody class="p-0">
                    <tr>
                        <td>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" rx="2" fill="#B9EBD4"></rect>
                                <circle cx="8" cy="8" r="4" fill="#3BB77E"></circle>
                            </svg>
                            cheese
                        </td>
                        <td>$ 70</td>
                        <td>
                            <div class="form-check d-block text-center">
                                <input class="form-check-input border-dark ms-0" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-primary">Add a drink</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" rx="2" fill="#B9EBD4"></rect>
                                <circle cx="8" cy="8" r="4" fill="#3BB77E"></circle>
                            </svg>
                            Chocolate shake
                        </td>
                        <td>$ 80</td>
                        <td>
                            <div class="form-check d-block text-center">
                                <input class="form-check-input border-dark ms-0" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault2">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" rx="2" fill="#B9EBD4"></rect>
                                <circle cx="8" cy="8" r="4" fill="#3BB77E"></circle>
                            </svg>
                            Coke (M)
                        </td>
                        <td>$ 70</td>
                        <td>
                            <div class="form-check d-block text-center">
                                <input class="form-check-input border-dark ms-0" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault3">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-primary">Add a Side</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" rx="2" fill="#B9EBD4"></rect>
                                <circle cx="8" cy="8" r="4" fill="#3BB77E"></circle>
                            </svg>
                            Fries (M)
                        </td>
                        <td>$ 60</td>
                        <td>
                            <div class="form-check d-block text-center">
                                <input class="form-check-input border-dark ms-0" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault4">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" rx="2" fill="#B9EBD4"></rect>
                                <circle cx="8" cy="8" r="4" fill="#3BB77E"></circle>
                            </svg>
                            Fries (L)
                        </td>
                        <td>$ 90</td>
                        <td>
                            <div class="form-check d-block text-center">
                                <input class="form-check-input border-dark ms-0" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault5">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" rx="2" fill="#B9EBD4"></rect>
                                <circle cx="8" cy="8" r="4" fill="#3BB77E"></circle>
                            </svg>
                            Fries (XL)
                        </td>
                        <td>$ 120</td>
                        <td>
                            <div class="form-check d-block text-center">
                                <input class="form-check-input border-dark ms-0" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault6">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-primary  rounded-pill me-4">Total $200</button>
                    <button type="button" class="btn btn-primary  rounded-pill ms-4">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

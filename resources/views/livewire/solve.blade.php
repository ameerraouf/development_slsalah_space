@if ($currentStep != 6)
<div style="display: none" class="row setup-content" id="step-3">
    @endif
    <div class="card min-height-250 p-3">
        <div class="container">
            <h5 class="text-dark text-center mb-3">{{ __('solve') }}</h5>
            <div class="row g-3">
                <div class="col-md-12 row row-cols-1 row-cols-lg-3 g-3 justify-content-center">
                    <div class="col">
                        <div>
                            <label for="">{{ __('solve1') }}</label>
                            <input type="text" class="form-control" wire:model='solve1' wire:change="solveSubmit1"
                                style="border: 2px solid  !important;">
                            @error('solve1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve2') }}</label>
                            <input type="text" class="form-control" wire:model='solve2' wire:change="solveSubmit2"
                                style="border: 2px solid  !important;">
                            @error('solve2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve3') }}</label>
                            <input type="text" class="form-control" wire:model='solve3' wire:change="solveSubmit3"
                                style="border: 2px solid  !important;">
                            @error('solve3')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="">{{ __('solve4') }}</label>
                            <input type="text" class="form-control" wire:model='solve4' wire:change="solveSubmit4"
                                style="border: 2px solid  !important;">
                            @error('solve4')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve5') }}</label>
                            <input type="text" class="form-control" wire:model='solve5' wire:change="solveSubmit5"
                                style="border: 2px solid  !important;">
                            @error('solve5')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve6') }}</label>
                            <input type="text" class="form-control" wire:model='solve6' wire:change="solveSubmit6"
                                style="border: 2px solid  !important;">
                            @error('solve6')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col">
                    <div class="">
                        <label for="">{{ __('solve7') }}</label>
                        <input type="text" class="form-control" wire:model='solve7' wire:change="solveSubmit7"
                            style="border: 2px solid  !important;">
                        @error('solve7')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="">
                        <label for="">{{ __('solve8') }}</label>
                        <input type="text" class="form-control" wire:model='solve8' wire:change="solveSubmit8"
                            style="border: 2px solid  !important;">
                        @error('solve8')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="">
                        <label for="">{{ __('solve9') }}</label>
                        <input type="text" class="form-control" wire:model='solve9' wire:change="solveSubmit9"
                            style="border: 2px solid  !important;">
                        @error('solve9')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" card card-slide" style="background-image: url('{{ display_file($image2)}}');">
                        <div class="container py-4">
                            <div class="row g-3">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark mb-4">الحل</h3>
                                    <p class="mb-3">اوصف حل الى تعمل الشركه على استخدامه فى حل المشكله</p>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                    <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip0"><rect x="992" y="265" width="39" height="39"/></clipPath></defs><g clip-path="url(#clip0)" transform="translate(-992 -265)"><path d="M1011.54 279.503C1010.94 279.503 1010.5 279.955 1010.5 280.5 1010.67 281.045 1011.11 281.5 1011.54 281.5 1012.06 281.5 1012.5 281.045 1012.5 280.5 1012.5 279.955 1012.06 279.503 1011.54 279.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1011.54 283.503C1010.94 283.503 1010.5 284.032 1010.5 284.667L1010.5 289.333C1010.67 289.969 1011.11 290.497 1011.54 290.497 1012.06 290.497 1012.5 289.969 1012.5 289.333L1012.5 284.667C1012.5 284.032 1012.06 283.503 1011.54 283.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M997.699 281.901 997.699 292.8 996.601 292.8C996.001 292.8 995.5 292.299 995.5 291.699L995.5 282.999C995.5 282.399 996.001 281.901 996.601 281.901ZM1027 281.901C1027.6 281.901 1028.1 282.399 1028.1 282.999L1028.1 291.699 1028.2 291.699C1028.2 292.299 1027.7 292.8 1027.1 292.8L1026 292.8 1026 281.901ZM1011.9 299.199C1012.5 299.199 1013 299.701 1013 300.301 1013 300.901 1012.5 301.399 1011.9 301.399 1011.2 301.399 1010.7 300.901 1010.7 300.301 1010.7 299.701 1011.2 299.199 1011.9 299.199ZM1012 266.5C1004.2 266.5 997.499 272.201 996.001 279.799 994.601 280.199 993.5 281.399 993.5 282.9L993.5 291.499C993.5 293.299 995.001 294.8 996.7 294.8L998.902 294.8C999.502 294.8 1000 294.298 1000 293.699L1000 280.701C1000 279.999 999.502 279.501 998.902 279.501L998.099 279.501C999.601 273.201 1005.4 268.5 1011.9 268.5 1018.5 268.5 1024.1 273.099 1025.6 279.501L1024.9 279.501C1024.2 279.501 1023.7 279.999 1023.7 280.701L1023.7 293.699C1023.7 294.298 1024.2 294.8 1024.9 294.8L1025.9 294.8C1025.4 297.301 1023.1 299.199 1020.5 299.199L1014.9 299.199C1014.4 297.901 1013.2 297 1011.7 297 1010 297 1008.5 298.501 1008.5 300.301 1008.5 301.999 1010 303.5 1011.7 303.5 1013.1 303.5 1014.4 302.7 1014.9 301.399L1020.5 301.399C1024.4 301.399 1027.6 298.501 1028 294.8 1029.2 294.4 1030.2 293.2 1030.2 291.699L1030.2 282.999C1030.5 281.399 1029.4 280.199 1028 279.799 1026.5 272.201 1019.7 266.5 1012 266.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1011.45 277.546C1015.67 277.546 1019.09 280.851 1019.09 285.029 1019.09 289.115 1015.57 292.42 1011.45 292.42 1009.94 292.42 1008.54 292.031 1007.23 291.349 1007.08 291.207 1006.83 291.118 1006.62 291.118 1006.55 291.118 1006.48 291.13 1006.43 291.155L1004.42 291.837 1005.02 289.893C1005.12 289.6 1005.02 289.211 1004.92 289.016 1004.11 287.754 1003.71 286.489 1003.71 285.128 1003.71 280.851 1007.23 277.546 1011.45 277.546ZM1011.55 275.503C1006.12 275.503 1001.6 279.78 1001.6 284.934 1001.6 286.588 1002 288.143 1002.91 289.6L1001.6 293.099C1001.5 293.488 1001.6 293.877 1001.9 294.266 1002.05 294.411 1002.36 294.5 1002.67 294.5 1002.79 294.5 1002.9 294.488 1003.01 294.46L1006.63 293.198C1008.13 293.975 1009.74 294.46 1011.55 294.46 1016.98 294.46 1021.5 290.183 1021.5 284.934 1021.5 279.78 1017.08 275.503 1011.55 275.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve1') }}</label>
                                    <p>{{ $solve1 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip1"><rect x="553" y="264" width="40" height="38"/></clipPath></defs><g clip-path="url(#clip1)" transform="translate(-553 -264)"><path d="M573.35 267.916C578.609 267.916 582.876 272.039 583.273 277.366 582.281 277.066 581.189 276.865 579.901 276.865 577.419 276.865 575.237 277.567 573.253 278.876 571.367 277.567 569.087 276.865 566.605 276.865 565.415 276.865 564.322 276.964 563.232 277.366 563.727 272.039 567.994 267.916 573.35 267.916ZM566.703 279.077C568.391 279.077 569.978 279.578 571.467 280.382 569.779 281.994 568.687 284.103 567.994 286.516 565.711 285.01 563.925 282.495 563.431 279.578 564.423 279.278 565.512 279.077 566.703 279.077ZM580.099 279.077C581.189 279.077 582.281 279.278 583.273 279.578 582.776 282.495 581.091 285.01 578.707 286.516 578.112 284.103 576.824 281.994 575.237 280.382 576.626 279.578 578.31 279.077 580.099 279.077ZM573.35 281.592C574.938 283.098 576.229 285.109 576.626 287.521 575.435 287.923 574.541 288.026 573.35 288.026 572.261 288.026 571.168 287.923 570.176 287.521 570.475 285.211 571.666 283.098 573.35 281.592ZM569.978 289.835 569.978 289.835C570.97 290.036 572.16 290.336 573.35 290.336 574.443 290.336 575.634 290.135 576.723 289.835L576.723 289.835C576.427 292.551 575.237 294.964 573.35 296.671 571.467 294.964 570.277 292.551 569.978 289.835ZM561.447 280.583C562.241 284.304 564.719 287.32 567.795 289.031L567.795 289.331C567.795 292.851 569.184 295.867 571.467 298.079 569.978 298.883 568.391 299.186 566.703 299.186 561.05 299.186 556.585 294.661 556.585 289.13 556.585 285.511 558.468 282.396 561.447 280.583ZM585.156 280.484C588.035 282.294 590.019 285.412 590.019 289.031 590.019 294.661 585.553 299.186 579.901 299.186 578.213 299.186 576.626 298.682 575.136 297.98 577.318 295.666 578.808 292.551 578.808 289.13L578.808 288.929C582.083 287.32 584.464 284.304 585.156 280.484ZM573.35 265.503C566.703 265.503 561.249 271.034 561.249 277.87L561.249 278.071C557.278 280.082 554.5 284.304 554.5 289.13 554.5 295.969 559.957 301.497 566.804 301.497 569.285 301.497 571.467 300.693 573.451 299.486 575.334 300.693 577.715 301.497 580.197 301.497 586.844 301.497 592.5 295.969 592.5 289.13 592.201 284.406 589.524 280.283 585.553 278.071L585.553 277.87C585.553 271.034 580.099 265.503 573.35 265.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve2') }}</label>
                                    <p>{{ $solve2 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip2"><rect x="207" y="258" width="40" height="41"/></clipPath></defs><g clip-path="url(#clip2)" transform="translate(-207 -258)"><path d="M241.077 262.086C241.166 262.086 241.262 262.11 241.339 262.15L243.498 263.405C243.59 263.598 243.686 263.885 243.59 263.983L242.56 265.813 239.743 264.078 240.776 262.248C240.83 262.135 240.952 262.086 241.077 262.086ZM238.43 266.392 241.244 268.127 235.052 279.021 232.238 277.384 238.43 266.392ZM231.768 279.891 233.272 280.855 231.675 281.913 231.768 279.891ZM242.277 275.551C243.028 275.551 243.498 276.13 243.498 276.901L243.498 294.641C243.498 295.317 242.84 295.896 242.277 295.896L212.065 295.896C211.314 295.896 210.847 295.317 210.847 294.641L210.847 276.901C210.847 276.13 211.41 275.551 212.065 275.551L230.454 275.551 229.516 277.094C229.424 277.286 229.424 277.479 229.424 277.77L229.049 283.168 225.013 283.168C224.358 283.168 223.888 283.747 223.888 284.518 223.888 285.194 224.451 285.772 225.013 285.772L239.838 285.772C240.493 285.772 241.151 285.194 241.151 284.518 241.151 283.747 240.493 283.168 239.838 283.168L234.21 283.168 236.178 281.819C236.273 281.721 236.553 281.626 236.553 281.335L239.838 275.551ZM241.059 259.5C240.064 259.5 239.114 260.036 238.617 260.993L237.024 263.885 231.958 272.95 212.16 272.95C210.189 272.95 208.5 274.587 208.5 276.613L208.5 294.641C208.5 296.667 210.189 298.497 212.16 298.497L242.372 298.497C244.436 298.497 246.03 296.762 246.03 294.641L246.03 276.901C246.03 274.878 244.436 273.143 242.372 273.143L241.339 273.143 245.75 265.428C246.5 263.885 246.03 262.055 244.624 261.186L242.56 259.932C242.084 259.641 241.565 259.5 241.059 259.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M224.674 290.504C223.991 290.504 223.5 291.194 223.5 292.002 223.5 292.923 224.087 293.496 224.674 293.496L240.131 293.496C240.814 293.496 241.5 292.806 241.5 292.002 241.5 291.194 240.814 290.504 240.131 290.504Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M217.449 277.503C216.639 277.503 216.135 278.051 216.135 278.689L216.135 279.513C214.615 279.968 213.503 281.34 213.503 282.985 213.503 284.905 215.325 286.002 216.639 286.915 217.651 287.646 218.866 288.284 218.866 289.015 218.866 289.656 218.159 290.112 217.449 290.112 216.639 290.112 216.135 289.563 216.135 289.015 216.135 288.284 215.527 287.736 214.92 287.736 214.11 287.736 213.503 288.284 213.503 289.015 213.503 290.57 214.615 291.849 216.135 292.397L216.135 293.221C216.135 293.952 216.841 294.5 217.449 294.5 218.159 294.5 218.866 293.952 218.866 293.221L218.866 292.397C220.385 291.942 221.497 290.57 221.497 289.015 221.497 287.098 219.675 285.909 218.361 284.995 217.349 284.357 216.135 283.626 216.135 282.985 216.032 282.254 216.639 281.706 217.449 281.706 218.159 281.706 218.866 282.254 218.866 282.985 218.866 283.626 219.473 284.081 220.08 284.081 220.89 284.081 221.497 283.533 221.497 282.985 221.497 281.34 220.385 280.061 218.866 279.513L218.866 278.689C218.866 278.051 218.159 277.503 217.449 277.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve3') }}</label>
                                    <p>{{ $solve3 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip3"><rect x="993" y="336" width="41" height="40"/></clipPath></defs><g clip-path="url(#clip3)" transform="translate(-993 -336)"><path d="M995.593 350.5C994.956 350.5 994.503 351.192 994.503 351.883 994.503 352.805 995.048 353.496 995.593 353.496L997.228 353.496C997.863 353.496 998.5 352.805 998.5 351.883 998.5 351.192 997.863 350.5 997.228 350.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1013.53 339.974C1020.03 339.974 1025.07 344.887 1025.07 351.121 1024.88 355.563 1022.17 359.626 1018.09 361.327 1017.61 361.609 1017.31 361.987 1017.31 362.553L1017.31 363.12 1009.65 363.12 1009.65 362.553C1009.65 362.083 1009.46 361.609 1008.98 361.327 1004.13 359.246 1001.31 354.24 1002.28 349.136 1003.06 344.791 1006.65 341.108 1011.11 340.163 1011.98 340.067 1012.85 339.974 1013.53 339.974ZM1017.22 365.576 1017.22 368.129 1009.56 368.129 1009.56 365.576ZM1016.93 370.585C1016.44 372.003 1015.18 373.041 1013.44 373.041 1011.79 373.041 1010.43 372.003 1009.85 370.585ZM1013.4 337.5C1012.43 337.5 1011.43 337.596 1010.43 337.8 1005 339.027 1000.63 343.375 999.664 348.665 998.5 354.996 1001.8 360.664 1007.04 363.216L1007.04 369.262C1007.04 372.663 1009.94 375.497 1013.44 375.497 1016.93 375.497 1019.93 372.663 1019.93 369.262L1019.93 363.216C1024.49 360.853 1027.5 356.223 1027.5 351.028 1027.41 343.483 1021.07 337.5 1013.4 337.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1013.45 342.503C1012.74 342.503 1012.23 343.087 1012.23 343.67L1012.23 344.544C1010.71 345.032 1009.5 346.489 1009.5 348.144 1009.5 350.284 1011.32 351.451 1012.74 352.423 1013.75 353.201 1014.87 353.884 1014.87 354.662 1014.87 355.341 1014.26 355.924 1013.45 355.924 1012.74 355.924 1012.23 355.341 1012.23 354.662 1012.23 353.884 1011.52 353.3 1010.92 353.3 1010.21 353.3 1009.5 353.884 1009.5 354.662 1009.5 356.313 1010.71 357.675 1012.23 358.259L1012.23 359.135C1012.23 359.815 1012.84 360.497 1013.45 360.497 1014.26 360.497 1014.87 359.815 1014.87 359.135L1014.87 358.259C1016.39 357.774 1017.5 356.313 1017.5 354.662 1017.5 352.522 1015.78 351.355 1014.36 350.382 1013.35 349.601 1012.23 348.922 1012.23 348.144 1012.03 347.462 1012.74 346.878 1013.45 346.878 1014.26 346.878 1014.87 347.462 1014.87 348.144 1014.87 348.922 1015.47 349.506 1016.08 349.506 1016.89 349.506 1017.5 348.922 1017.5 348.144 1017.5 346.489 1016.39 345.128 1014.87 344.544L1014.87 343.67C1014.87 342.988 1014.26 342.503 1013.45 342.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1002.09 362.5C1001.74 362.5 1001.4 362.597 1001.16 362.792L999.989 363.727C999.503 364.118 999.503 364.741 999.989 365.208 1000.23 365.404 1000.55 365.5 1000.87 365.5 1001.18 365.5 1001.5 365.404 1001.74 365.208L1003.01 364.273C1003.5 363.883 1003.5 363.183 1003.01 362.792 1002.77 362.597 1002.43 362.5 1002.09 362.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1026.09 337.503C1025.74 337.503 1025.4 337.632 1025.16 337.892L1023.89 339.24C1023.5 339.76 1023.5 340.591 1023.89 341.111 1024.13 341.368 1024.48 341.5 1024.82 341.5 1025.16 341.5 1025.5 341.368 1025.74 341.111L1027.01 339.866C1027.5 339.345 1027.5 338.409 1027.01 337.892 1026.77 337.632 1026.43 337.503 1026.09 337.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1024.82 362.5C1024.48 362.5 1024.13 362.597 1023.89 362.792 1023.5 363.183 1023.5 363.883 1023.89 364.273L1025.16 365.208C1025.4 365.404 1025.74 365.5 1026.09 365.5 1026.43 365.5 1026.77 365.404 1027.01 365.208 1027.5 364.817 1027.5 364.118 1027.01 363.727L1025.74 362.792C1025.5 362.597 1025.16 362.5 1024.82 362.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1000.87 337.503C1000.55 337.503 1000.23 337.632 999.989 337.892 999.503 338.409 999.503 339.345 999.989 339.866L1001.16 341.111C1001.4 341.368 1001.74 341.5 1002.09 341.5 1002.43 341.5 1002.77 341.368 1003.01 341.111 1003.5 340.591 1003.5 339.76 1003.01 339.24L1001.74 337.892C1001.5 337.632 1001.18 337.503 1000.87 337.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1029.75 350.5C1029.12 350.5 1028.5 351.192 1028.5 351.883 1028.5 352.805 1029.12 353.496 1029.75 353.496L1031.34 353.496C1031.97 353.496 1032.41 352.805 1032.41 351.883 1032.5 351.192 1031.97 350.5 1031.34 350.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                    <label for="">{{ __('solve4') }}</label>
                                    <p>{{ $solve4 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip4"><rect x="555" y="334" width="39" height="39"/></clipPath></defs><g clip-path="url(#clip4)" transform="translate(-555 -334)"><path d="M564 337.492C564.591 337.492 565.086 337.991 565.086 338.587 565.086 339.184 564.591 339.68 564 339.68L559.66 339.68C559.068 339.68 558.576 339.184 558.576 338.587 558.576 337.991 559.068 337.492 559.66 337.492ZM577.023 337.492C577.712 337.492 578.207 337.991 578.207 338.587 578.207 339.184 577.712 339.68 577.023 339.68L572.78 339.68C572.091 339.68 571.596 339.184 571.596 338.587 571.596 337.991 572.091 337.492 572.78 337.492ZM590.243 337.492C590.835 337.492 591.327 337.991 591.327 338.587 591.327 339.184 590.835 339.68 590.243 339.68L585.9 339.68C585.308 339.68 584.817 339.184 584.817 338.587 584.817 337.991 585.308 337.492 585.9 337.492ZM579.293 350.621C579.885 350.621 580.377 351.116 580.377 351.713L580.377 356.189C580.377 356.887 579.885 357.383 579.293 357.383L570.61 357.383C570.018 357.383 569.526 356.887 569.526 356.189L569.526 351.713C569.526 351.116 570.018 350.621 570.61 350.621ZM564 368.324C564.591 368.324 565.086 368.819 565.086 369.416 565.086 370.013 564.591 370.511 564 370.511L559.66 370.511C559.068 370.511 558.576 370.013 558.576 369.416 558.576 368.819 559.068 368.324 559.66 368.324ZM577.12 368.324C577.812 368.324 578.307 368.819 578.307 369.416 578.307 370.013 577.812 370.511 577.12 370.511L572.88 370.511C572.188 370.511 571.696 370.013 571.696 369.416 571.696 368.819 572.188 368.324 572.88 368.324ZM590.243 368.324C590.835 368.324 591.327 368.819 591.327 369.416 591.327 370.013 590.835 370.511 590.243 370.511L585.9 370.511C585.308 370.511 584.817 370.013 584.817 369.416 584.817 368.819 585.308 368.324 585.9 368.324ZM559.66 335.503C557.784 335.503 556.503 336.996 556.503 338.685 556.503 340.576 557.981 341.968 559.66 341.968L560.746 341.968 560.746 343.06C560.746 344.951 562.224 346.242 564 346.242L573.867 346.242 573.867 348.531 570.61 348.531C568.834 348.531 567.353 350.024 567.353 351.713L567.353 356.189C567.353 358.08 568.834 359.472 570.61 359.472L573.867 359.472 573.867 361.66 564 361.66C562.127 361.66 560.746 363.15 560.746 364.94L560.746 366.035 559.66 366.035C557.784 366.035 556.503 367.528 556.503 369.318 556.503 371.108 557.981 372.5 559.66 372.5L564 372.5C565.875 372.5 567.156 371.007 567.156 369.318 567.156 367.427 565.678 366.035 564 366.035L562.916 366.035 562.916 364.94C562.916 364.343 563.408 363.847 564 363.847L573.867 363.847 573.867 366.035 572.78 366.035C570.907 366.035 569.526 367.528 569.526 369.318 569.526 371.108 571.004 372.5 572.78 372.5L577.023 372.5C578.899 372.5 580.28 371.007 580.28 369.318 580.28 367.427 578.798 366.035 577.023 366.035L575.936 366.035 575.936 363.847 585.803 363.847C586.395 363.847 586.887 364.343 586.887 364.94L586.887 366.035 585.803 366.035C583.928 366.035 582.647 367.528 582.647 369.318 582.647 371.108 584.028 372.5 585.803 372.5L590.143 372.5C591.919 372.5 593.3 371.007 593.3 369.318 593.3 367.427 591.822 366.035 590.143 366.035L588.96 366.035 588.96 364.94C588.96 363.052 587.579 361.66 585.803 361.66L575.936 361.66 575.936 359.472 579.096 359.472C580.968 359.472 582.45 357.979 582.45 356.189L582.45 351.713C582.45 349.923 580.968 348.531 579.096 348.531L575.936 348.531 575.936 346.242 585.9 346.242C587.776 346.242 589.157 344.752 589.157 343.06L589.157 341.968 590.243 341.968C592.116 341.968 593.497 340.475 593.497 338.685 593.497 336.797 592.019 335.503 590.243 335.503L585.9 335.503C584.125 335.503 582.744 336.996 582.744 338.685 582.744 340.576 584.225 341.968 585.9 341.968L587.084 341.968 587.084 343.06C587.084 343.657 586.592 344.156 585.9 344.156L576.037 344.156 576.037 341.968 577.22 341.968C578.996 341.968 580.377 340.475 580.377 338.685 580.377 336.797 578.899 335.503 577.22 335.503L572.88 335.503C571.004 335.503 569.624 336.996 569.624 338.685 569.624 340.576 571.105 341.968 572.88 341.968L573.964 341.968 573.964 344.156 564.1 344.156C563.508 344.156 563.013 343.657 563.013 343.06L563.013 341.968 564.1 341.968C565.972 341.968 567.353 340.475 567.353 338.685 567.353 336.797 565.875 335.503 564.1 335.503Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve5') }}</label>
                                    <p>{{ $solve5 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip5"><rect x="206" y="326" width="38" height="39"/></clipPath></defs><g clip-path="url(#clip5)" transform="translate(-206 -326)"><path d="M225.261 329.606C226.507 329.606 227.467 330.563 227.467 331.809 227.467 332.958 226.507 333.915 225.261 333.915 224.109 333.915 223.149 332.958 223.149 331.809 223.149 330.563 224.204 329.606 225.261 329.606ZM225.261 335.927C228.14 335.927 230.541 338.319 230.541 341.382L230.541 342.437 219.98 342.437 219.98 341.382C219.98 338.319 222.381 335.927 225.261 335.927ZM214.7 348.661C215.949 348.661 216.909 349.618 216.909 350.767 216.909 352.01 215.949 352.967 214.7 352.967 213.548 352.967 212.588 352.01 212.588 350.767 212.588 349.618 213.548 348.661 214.7 348.661ZM236.011 348.661C237.162 348.661 238.122 349.618 238.122 350.767 238.122 352.01 237.162 352.967 236.011 352.967 234.764 352.967 233.805 352.01 233.805 350.767 233.805 349.618 234.764 348.661 236.011 348.661ZM214.7 354.979C217.579 354.979 219.98 357.373 219.98 360.34L219.98 361.488 209.42 361.488 209.42 360.34C209.42 357.373 211.821 354.979 214.7 354.979ZM236.011 354.979C238.89 354.979 241.291 357.373 241.291 360.34L241.291 361.488 230.733 361.488 230.733 360.34C230.733 357.373 233.131 354.979 236.011 354.979ZM225.453 327.5C223.149 327.5 221.23 329.415 221.23 331.618 221.23 332.767 221.614 333.627 222.284 334.49 219.788 335.736 218.061 338.225 218.061 341.191L218.061 343.394C218.061 343.968 218.539 344.449 219.213 344.449L224.493 344.449 224.493 349.235 219.307 354.31C218.923 353.927 218.445 353.638 217.963 353.541 218.731 352.873 219.021 351.915 219.021 350.669 219.021 348.372 217.101 346.457 214.892 346.457 212.588 346.457 210.669 348.372 210.669 350.669 210.669 351.724 211.053 352.681 211.726 353.541 209.228 354.787 207.5 357.276 207.5 360.245L207.5 362.446C207.5 363.02 207.981 363.5 208.652 363.5L221.132 363.5C221.708 363.5 222.19 363.02 222.19 362.446L222.19 360.245C222.19 358.616 221.614 356.991 220.748 355.842L225.355 351.15 230.06 355.842C229.1 356.991 228.619 358.616 228.619 360.245L228.619 362.446C228.619 363.02 229.1 363.5 229.77 363.5L242.443 363.5C243.019 363.5 243.5 363.02 243.5 362.446L243.5 360.245C243.403 357.373 241.58 354.787 239.082 353.541 239.755 352.873 240.139 351.915 240.139 350.669 240.139 348.372 238.22 346.457 236.011 346.457 233.707 346.457 231.787 348.372 231.787 350.669 231.787 351.724 232.171 352.681 232.845 353.541 232.363 353.83 231.979 354.021 231.501 354.31L226.413 349.235 226.413 344.449 231.693 344.449C232.269 344.449 232.747 343.968 232.747 343.394L232.747 341.191C232.747 338.225 230.925 335.736 228.524 334.49 229.292 333.821 229.578 332.861 229.578 331.618 229.578 329.415 227.659 327.5 225.453 327.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve6') }}</label>
                                    <p>{{ $solve6 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip6"><rect x="999" y="405" width="37" height="36"/></clipPath></defs><g clip-path="url(#clip6)" transform="translate(-999 -405)"><path d="M1018.5 414.598C1020.53 415.076 1022.38 416.982 1023.47 419.816 1023.63 420.212 1024 420.454 1024.4 420.454 1024.52 420.454 1024.64 420.431 1024.76 420.386 1025.28 420.189 1025.53 419.616 1025.33 419.101 1024.76 417.619 1023.99 416.314 1023.07 415.268L1023.07 415.268C1024.97 415.825 1026.72 416.674 1028.21 417.784 1030.2 419.269 1031.55 421.091 1032.15 423.065 1031.32 422.657 1030.41 422.445 1029.49 422.445 1029.48 422.445 1029.46 422.445 1029.45 422.445 1028.17 422.445 1026.96 422.828 1026.04 423.517 1025.84 423.672 1025.64 423.84 1025.47 424.027 1025.29 423.84 1025.1 423.672 1024.9 423.517 1023.98 422.828 1022.77 422.445 1021.48 422.445 1020.2 422.445 1018.99 422.828 1018.07 423.517 1017.87 423.672 1017.68 423.84 1017.5 424.027 1017.33 423.84 1017.13 423.672 1016.93 423.517 1016.01 422.828 1014.8 422.445 1013.52 422.445 1012.24 422.445 1011.02 422.828 1010.1 423.517 1009.9 423.672 1009.71 423.84 1009.53 424.027 1009.36 423.84 1009.16 423.672 1008.96 423.517 1008.04 422.828 1006.83 422.445 1005.55 422.445 1005.54 422.445 1005.52 422.445 1005.51 422.445 1004.59 422.445 1003.68 422.657 1002.85 423.065 1003.45 421.091 1004.8 419.269 1006.8 417.784 1008.28 416.674 1010.03 415.825 1011.93 415.268L1011.93 415.268C1011.01 416.314 1010.24 417.619 1009.67 419.101 1009.47 419.616 1009.73 420.189 1010.24 420.386 1010.36 420.431 1010.48 420.454 1010.6 420.454 1011 420.454 1011.37 420.212 1011.53 419.816 1012.62 416.982 1014.47 415.076 1016.51 414.598L1016.51 419.461C1016.51 420.008 1016.95 420.454 1017.5 420.454 1018.05 420.454 1018.5 420.008 1018.5 419.461L1018.5 414.598ZM1017.5 410.5C1016.95 410.5 1016.51 410.947 1016.51 411.499L1016.51 412.513C1012.4 412.692 1008.57 413.983 1005.6 416.186 1002.31 418.638 1000.5 421.919 1000.5 425.433L1000.5 426.427C1000.5 426.979 1000.95 427.423 1001.5 427.423 1002.05 427.423 1002.49 426.979 1002.49 426.427 1002.49 425.365 1003.92 424.435 1005.55 424.435 1007.17 424.435 1008.54 425.349 1008.54 426.427 1008.54 426.979 1008.98 427.418 1009.53 427.418 1010.08 427.418 1010.53 426.979 1010.53 426.427 1010.53 425.349 1011.9 424.435 1013.52 424.435 1015.14 424.435 1016.51 425.349 1016.51 426.427L1016.51 427.158C1016.51 427.202 1016.51 427.249 1016.51 427.292 1016.51 427.334 1016.51 427.381 1016.51 427.423L1016.51 436.518C1016.51 437.617 1015.61 438.508 1014.52 438.508 1013.41 438.508 1012.52 437.617 1012.52 436.518L1012.52 435.519C1012.52 434.973 1012.08 434.526 1011.52 434.526 1010.97 434.526 1010.53 434.973 1010.53 435.519L1010.53 436.518C1010.53 438.716 1012.31 440.498 1014.52 440.498 1016.71 440.498 1018.5 438.716 1018.5 436.518L1018.5 427.423C1018.49 427.376 1018.49 427.334 1018.49 427.292 1018.49 427.244 1018.49 427.202 1018.5 427.158L1018.5 426.427C1018.5 425.349 1019.86 424.435 1021.48 424.435 1023.1 424.435 1024.48 425.349 1024.48 426.427 1024.48 426.979 1024.92 427.418 1025.47 427.418 1026.02 427.418 1026.47 426.979 1026.47 426.427 1026.47 425.349 1027.83 424.435 1029.45 424.435 1031.07 424.435 1032.51 425.365 1032.51 426.427 1032.51 426.979 1032.95 427.418 1033.51 427.418 1034.05 427.418 1034.5 426.979 1034.5 426.427L1034.5 425.433C1034.5 421.919 1032.69 418.638 1029.4 416.186 1026.44 413.983 1022.6 412.692 1018.5 412.513L1018.5 411.499C1018.5 410.947 1018.05 410.5 1017.5 410.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1013.5 406.502C1012.94 406.502 1012.5 406.948 1012.5 407.503L1012.5 409.503C1012.5 410.052 1012.94 410.498 1013.5 410.498 1014.05 410.498 1014.5 410.052 1014.5 409.503L1014.5 407.503C1014.5 406.948 1014.05 406.502 1013.5 406.502Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1021.5 406.502C1020.94 406.502 1020.5 406.948 1020.5 407.503L1020.5 409.503C1020.5 410.052 1020.94 410.498 1021.5 410.498 1022.05 410.498 1022.5 410.052 1022.5 409.503L1022.5 407.503C1022.5 406.948 1022.05 406.502 1021.5 406.502Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1027.5 408.5C1026.94 408.5 1026.5 408.949 1026.5 409.503L1026.5 411.502C1026.5 412.051 1026.94 412.5 1027.5 412.5 1028.05 412.5 1028.5 412.051 1028.5 411.502L1028.5 409.503C1028.5 408.949 1028.05 408.5 1027.5 408.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M1007.5 408.5C1006.94 408.5 1006.5 408.949 1006.5 409.503L1006.5 411.502C1006.5 412.051 1006.94 412.5 1007.5 412.5 1008.05 412.5 1008.5 412.051 1008.5 411.502L1008.5 409.503C1008.5 408.949 1008.05 408.5 1007.5 408.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve7') }}</label>
                                    <p>{{ $solve7 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip7"><rect x="557" y="403" width="40" height="40"/></clipPath></defs><g clip-path="url(#clip7)" transform="translate(-557 -403)"><path d="M582.152 406.797C588.88 406.797 594.323 412.283 594.323 418.97 594.323 425.759 588.88 431.245 582.152 431.245 575.521 431.245 570.078 425.759 570.078 418.97 570.078 412.283 575.521 406.797 582.152 406.797ZM571.265 428.353C571.761 428.952 572.255 429.449 572.848 429.95L570.078 432.842 568.397 431.245 571.265 428.353ZM566.814 432.743 568.397 434.34 562.854 439.928C562.656 440.127 562.385 440.229 562.1 440.229 561.817 440.229 561.519 440.127 561.27 439.928 560.875 439.63 560.875 438.832 561.27 438.331L566.814 432.743ZM582.152 404.5C574.233 404.5 567.804 410.988 567.804 418.97 567.804 421.764 568.595 424.362 569.88 426.557L559.788 436.836C558.5 438.034 558.5 440.229 559.788 441.524 560.382 442.174 561.223 442.5 562.075 442.5 562.929 442.5 563.796 442.174 564.437 441.524L574.629 431.346C576.809 432.743 579.479 433.444 582.152 433.444 590.067 433.444 596.5 426.956 596.5 418.97 596.5 410.988 590.067 404.5 582.152 404.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/><path d="M583.511 418.227C583.106 419.246 582.399 420.061 581.486 420.265L581.486 418.227ZM580.374 413.745C581.891 413.745 583.106 414.66 583.511 416.086L580.374 416.086C579.664 416.086 579.259 416.597 579.259 417.209L579.259 420.365C577.945 419.857 576.933 418.635 576.933 417.209 576.933 415.271 578.449 413.745 580.374 413.745ZM588.17 418.227 588.17 425.155 581.387 425.155 581.387 422.71C583.511 422.199 585.333 420.569 585.741 418.227ZM580.271 411.5C577.032 411.5 574.5 414.049 574.5 417.209 574.5 419.958 576.425 422.303 579.057 422.81L579.057 426.378C579.057 426.989 579.565 427.5 580.271 427.5L589.183 427.5C589.89 427.5 590.397 426.989 590.397 426.378L590.397 417.309C590.497 416.597 589.992 416.086 589.385 416.086L585.741 416.086C585.333 413.541 583.006 411.5 580.271 411.5Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve8') }}</label>
                                    <p>{{ $solve8 }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex gap-2 text-break">
                                <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" overflow="hidden"><defs><clipPath id="clip8"><rect x="207" y="399" width="38" height="36"/></clipPath></defs><g clip-path="url(#clip8)" transform="translate(-207 -399)"><path d="M241.337 413.25C241.916 413.25 242.39 413.726 242.39 414.315L242.39 415.376 231.844 415.376 231.844 414.315C231.844 413.726 232.316 413.25 232.901 413.25ZM241.337 402.626C241.916 402.626 242.39 403.103 242.39 403.692L242.39 411.307C242.052 411.187 241.693 411.125 241.337 411.125L232.901 411.125C231.151 411.125 229.734 412.553 229.734 414.315L229.734 421.751 210.611 421.751 210.611 403.692C210.611 403.103 211.084 402.626 211.669 402.626ZM229.734 423.875 229.734 425.999 211.669 425.999C211.084 425.999 210.611 425.524 210.611 424.941L210.611 423.875ZM242.39 417.5 242.39 428.123 231.844 428.123 231.844 417.5ZM229.734 428.123 229.734 431.314C229.734 431.672 229.795 432.034 229.915 432.374L221.634 432.374 223.041 428.123ZM242.39 430.25 242.39 431.314C242.39 431.897 241.916 432.374 241.337 432.374L232.901 432.374C232.316 432.374 231.844 431.897 231.844 431.314L231.844 430.25ZM211.669 400.502C209.919 400.502 208.502 401.93 208.502 403.692L208.502 424.941C208.502 426.697 209.919 428.123 211.669 428.123L220.819 428.123 219.414 432.374 215.955 432.374C215.37 432.374 214.902 432.851 214.902 433.44 214.902 434.023 215.37 434.498 215.955 434.498L241.337 434.498C243.081 434.498 244.498 433.07 244.498 431.314L244.498 403.692C244.498 401.93 243.081 400.502 241.337 400.502Z" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/></g></svg>
                                    <div class="flex-fill">
                                        <label for="">{{ __('solve9') }}</label>
                                    <p>{{ $solve9 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(5)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-0" type="button" wire:click="sixthStepSubmit">
                        {{ trans('next') }}
                    </button>
            </div>
        </div>
    </div>
</div>
<?php

namespace App\Enums;

abstract class eRespCode
{
    // Common
    const _403_NOT_AUTHORIZED = ['403_00' => 'Not Authorized'];
    const _400_BAD_REQUEST = ['400_00' => 'Bad Request'];
    const _500_INTERNAL_ERROR = ['500_00' => 'Internal Error'];
    const _520_UNKNOWN_ERROR = ['520_00' => 'Unknown Error'];
    const _200_OK = ['200_00' => 'OK'];
    const _404_NOT_FOUND = ['404_00' => 'Not Found'];

    // Product

    // 200
    const P_LISTED_200_00 = ['P200_00' => 'Products succesfully listed !'];
    const P_UPDATED_200_01 = ['P200_01' => 'Product succesfully updated !'];
    const P_DELETED_200_02 = ['P200_02' => 'Product succesfully deleted !'];
    const P_GET_200_03 = ['P200_03' => 'Product succesfully retreived !'];
    // 201
    const P_CREATED_201_00 = ['P201_00' => 'Product succesfully created !'];
    // 404
    const P_NOT_FOUND_404_00 = ['P404_00' => 'Product not found !'];

    // Category

    // 200
    const CAT_LISTED_200_00 = ['CAT200_00' => 'Categories  succesfully listed !'];
    const CAT_UPDATED_200_01 = ['CAT200_01' => 'Category succesfully updated !'];
    const CAT_DELETED_200_02 = ['CAT200_02' => 'Category succesfully deleted !'];
    const CAT_GET_200_03 = ['CAT200_03' => 'Category succesfully retreived !'];
    // 201
    const CAT_CREATED_201_00 = ['CAT201_00' => 'Category succesfully created !'];
    // 404
    const CAT_NOT_FOUND_404_00 = ['CAT404_00' => 'Category not found !'];


    const F_UPLOADED_201_00 = ['F201_00' => 'file succesfully uploaded !'];
}

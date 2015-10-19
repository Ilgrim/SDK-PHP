<?php

namespace S2P_SDK;

if( !defined( 'S2P_SDK_DIR_STRUCTURES' ) )
    die( 'Something went wrong.' );

class S2P_SDK_Structure_Merchantsite_Details extends S2P_SDK_Scope_Structure
{
    /**
     * Function should return array with full variable definition
     * @return array
     */
    public function get_definition()
    {
        return array(
            'name' => 'merchantsitedetails',
            'external_name' => 'MerchantSiteDetails',
            'type' => S2P_SDK_VTYPE_BLOB,
            'structure' => $this->get_structure_definition(),
        );
    }

    /**
     * Function should return structure definition for blobs or array variables
     * @return array
     */
    public function get_structure_definition()
    {
        return array(
            array(
                'name' => 'reasons',
                'external_name' => 'Reasons',
                'type' => S2P_SDK_VTYPE_BLARRAY,
                'default' => null,
                'structure' => array(
                    array(
                        'name' => 'code',
                        'external_name' => 'Code',
                        'type' => S2P_SDK_VTYPE_INT,
                        'default' => 0,
                    ),
                    array(
                        'name' => 'info',
                        'external_name' => 'Info',
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                    ),
                )
            ),
            array(
                'name' => 'name',
                'external_name' => 'Name',
                'display_name' => self::s2p_t( 'Site Name' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'country',
                'external_name' => 'Country',
                'display_name' => self::s2p_t( 'Site country' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'address',
                'external_name' => 'Address',
                'display_name' => self::s2p_t( 'Site contact address' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'bankname',
                'external_name' => 'BankName',
                'display_name' => self::s2p_t( 'Site bank name' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'bankaddress',
                'external_name' => 'BankAddress',
                'display_name' => self::s2p_t( 'Site bank address' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'accountiban',
                'external_name' => 'AccountIBAN',
                'display_name' => self::s2p_t( 'Site account IBAN' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'accountswift',
                'external_name' => 'AccountSWIFT',
                'display_name' => self::s2p_t( 'Site account SWIFT' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'bankswiftid',
                'external_name' => 'BankSWIFTID',
                'display_name' => self::s2p_t( 'Site bank SWIFT' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
            array(
                'name' => 'bankcode',
                'external_name' => 'BankCode',
                'display_name' => self::s2p_t( 'Site bank code' ),
                'type' => S2P_SDK_VTYPE_STRING,
            ),
       );
    }

}
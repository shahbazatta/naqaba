<?php
//////////////////////////////////////////////////////////////////////
// localizedStrings.php
//
// @usage
//
//     1. Load this file.
//
//         --------------------------------------------------
//         require_once('localizedStrings.php');
//         use noknowliblocalelocalizedStrings;
//         --------------------------------------------------
//
//     2. Initialize Dispatcher class.
//
//         --------------------------------------------------
//         $localizedStrings = new localizedStringsLocalizedStrings();
//         --------------------------------------------------
//
//     3. Add localized strings from json file.
//
//         --------------------------------------------------
//         // When adding localized strings for English from json file.
//         $json_en = 'en.json';
//         $localizedStrings->AddLocalizedJsonFile($localizedStrings::LC_EN, $json_en);
//         
//         // When adding localized strings for arabic from json file.
//         $json_ja = 'ja.json';
//         $localizedStrings->AddLocalizedJsonFile($localizedStrings::LC_AR, $json_ja);
//         --------------------------------------------------
//
//         [en.json]
//         --------------------------------------------------
//         {
//             "login": "Login"
//         }
//         --------------------------------------------------
//
//         [ja.json]
//         --------------------------------------------------
//         {
//             "login": "ログイン"
//         }
//         --------------------------------------------------
//
//     4. Now, you can use it!!
//
//         4-1. Get localized strings object.
//
//             --------------------------------------------------
//             // When getting localized strings for English.
//             $stringsEn = $localizedStrings->Strings($localizedStrings::LC_EN);
//             
//             // When getting localized strings for arabic.
//             $stringsJa = $localizedStrings->Strings($localizedStrings::LC_AR);
//             --------------------------------------------------
//
//         4-2. Get localized string from a key.
//
//             --------------------------------------------------
//             // When getting localized string for 'login' in English.
//             $localizedStrings->String($localizedStrings::LC_EN, 'login');
//             --------------------------------------------------
//
//

namespace noknowliblocalelocalizedStrings;

class LocalizedStrings {

    //////////////////////////////////////////////////////////////////////
    // Properties
    //////////////////////////////////////////////////////////////////////
    const LC_EN = 'en';
    const LC_AR = 'ar';
    private $version;
    private $localizedStrings = array();


    //////////////////////////////////////////////////////////////////////
    // Constructor
    //////////////////////////////////////////////////////////////////////
    public function __construct() {
        $this->version = phpversion();
    }


    //////////////////////////////////////////////////////////////////////
    // Add localized strings from json file.
    //////////////////////////////////////////////////////////////////////
    public function AddLocalizedJsonFile(string $langCode, string $filePath): void {
        $contents = file_get_contents($filePath);
        if($contents === false) {
            return;
        }
        $json = json_decode($contents);
        if(json_last_error() !== JSON_ERROR_NONE) {
            return;
        }
        $this->localizedStrings[$langCode] = $json;
    }


    //////////////////////////////////////////////////////////////////////
    // Get a localized string object.
    //////////////////////////////////////////////////////////////////////
    public function Strings(string $langCode): object {
        if(array_key_exists($langCode, $this->localizedStrings)) {
            return $this->localizedStrings[$langCode];
        } else {
            return array();
        }
    }


    //////////////////////////////////////////////////////////////////////
    // Get a localized string.
    //////////////////////////////////////////////////////////////////////
    public function String(string $langCode, string $key): string {
        if(array_key_exists($langCode, $this->localizedStrings)) {
            $s = $this->localizedStrings[$langCode]->{$key};
            if(isset($s)) {
                return $s;
            } else {
                return $key;
            }
        } else {
            return $key;
        }
    }
   

}
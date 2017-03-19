<?php

namespace InstagramAPI\Devices;

/**
 * This is a list of popular, modern Android phones, all VERIFIED to support
 * receiving the max-resolution videos from Instagram's API replies. This list
 * has to be hand-crafted, because bad devices only receive low-resolution
 * videos! Instagram's API looks at device MODEL when deciding to deliver HD.
 *
 * The goal with this list is to have a list of ~10 modern phones which we only
 * have to refresh every few years, as they slip away into obscurity.
 *
 * Here are the rules for building the list:
 *
 * - Find a top-list of the best Android phones for [current year].
 * - Only select devices with super high resolution screens (at least 1080p+).
 * - Find the model at https://www.handsetdetection.com/properties/devices.
 * - Some phones have tons of sub-models. Find the phone on Amazon and look at
 *   the details to find sub-model identifier for the most popular US variant!
 * - Research the model's popularity. For example, NEVER include a Samsung phone
 *   with an "X" suffix (such as SM-G935X). Those are STORE DEMO units.
 * - Check if they've recorded any Instagram user agent. If there are multiple
 *   agents for Instagram, compare them all carefully and pick the latest.
 * - Look closely to make sure the string wasn't truncated or modified on their
 *   site. I've seen phones lacking the locale and final parenthesis, for
 *   example. Or strings that are all-lowercase. DO NOT USE THOSE!
 * - Verify the device details by doing a Google search for the model identifier
 *   you found in the user-agent, to verify all specs match the real device.
 * - Enter good models below in the same format as the other devices. Triple and
 *   quadruple check that it is 100% CORRECT for that device.
 * - Always enter the EXACT Android version that the user agent was seen with on
 *   the website above, which is usually the OS version the phone released with.
 * - The Android version is the first part of the agent, such as "23/6.0.1".
 *
 * Here's an example string:
 * "Instagram 10.9.0 Android (23/6.0.1; 480dpi; 1080x1776; LENOVO/Lenovo; Lenovo P2a42; P2a42; qcom; fr_FR)".
 *
 * The format is made via the android.os.Build library:
 * "Instagram %s Android (%s/%s; %s; %s; %s/%s; %s; %s; %s)
 * 1. Instagram VERSION.
 * 2. Android API VERSION (Build$VERSION.SDK_INT)
 * 3. Android VERSION (Build$VERSION.RELEASE)
 * 4. DPI.
 * 5. Display Resolution.
 * 6. MANUFACTURER.
 * 7 (optional). BRAND (this "/"-portion with a brand doesn't always exist).
 * 8. MODEL.
 * 9. DEVICE.
 * 10. CPU (Build.HARDWARE)
 * 11. Language (Build.LOCALE).
 *
 * We only want the part within parenthesis, and we ignore the locale.
 *
 * That gives us the following string:
 * "23/6.0.1; 480dpi; 1080x1776; LENOVO/Lenovo; Lenovo P2a42; P2a42; qcom".
 *
 * However, note that the device above isn't at least 1920x1080. Don't use it.
 *
 *
 * DO NOT CONTRIBUTE TO THIS LIST IF YOU DON'T UNDERSTAND ALL OF THE ABOVE.
 * PERFECTLY. ALL CONTRIBUTIONS MUST INCLUDE THE RELEASE DATE, HANDSETDETECTION
 * AND A LINK TO A PAGE (SUCH AS AMAZON) FOR THAT EXACT MODEL SPECIFIER, AS SEEN
 * BELOW, SO THAT WE CAN VALIDATE ALL AGENTS TO SEE THAT YOU AREN'T A MORON.
 *
 *
 */
class GoodDevices
{
    /*
     * LAST-UPDATED: MARCH 2017.
     */
    const DEVICES = [
        /* OnePlus 3T. Released: November 2016.
         * https://www.amazon.com/OnePlus-A3010-64GB-Gunmetal-International/dp/B01N4H00V8
         * https://www.handsetdetection.com/properties/devices/OnePlus/A3010
         */
        '24/7.0; 380dpi; 1080x1920; OnePlus; ONEPLUS A3010; OnePlus3T; qcom',

        /* LG G5. Released: April 2016.
         * https://www.amazon.com/LG-Unlocked-Phone-Titan-Warranty/dp/B01DJE22C2
         * https://www.handsetdetection.com/properties/devices/LG/RS988
         */
        '23/6.0.1; 640dpi; 1440x2392; LGE/lge; RS988; h1; h1',

        /* Huawei Mate 9 Pro. Released: January 2017.
         * https://www.amazon.com/Huawei-Dual-Sim-Titanium-Unlocked-International/dp/B01N9O1L6N
         * https://www.handsetdetection.com/properties/devices/Huawei/LON-L29
         */
        '24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660',

        /* ZTE Axon 7. Released: June 2016.
         * https://www.frequencycheck.com/models/OMYDK/zte-axon-7-a2017u-dual-sim-lte-a-64gb
         * https://www.handsetdetection.com/properties/devices/ZTE/A2017U
         */
        '23/6.0.1; 640dpi; 1440x2560; ZTE; ZTE A2017U; ailsa_ii; qcom',

        /* Samsung Galaxy S7 Edge SM-G935F. Released: March 2016.
         * https://www.amazon.com/Samsung-SM-G935F-Factory-Unlocked-Smartphone/dp/B01C5OIINO
         * https://www.handsetdetection.com/properties/devices/Samsung/SM-G935F
         */
        '23/6.0.1; 640dpi; 1440x2560; samsung; SM-G935F; hero2lte; samsungexynos8890',

        /* Samsung Galaxy S7 SM-G930F. Released: March 2016.
         * https://www.amazon.com/Samsung-SM-G930F-Factory-Unlocked-Smartphone/dp/B01J6MS6BC
         * https://www.handsetdetection.com/properties/devices/Samsung/SM-G930F
         */
        '23/6.0.1; 640dpi; 1440x2560; samsung; SM-G930F; herolte; samsungexynos8890',
    ];

    /**
     * Retrieve the device string for a random good device.
     *
     * @return string
     */
    public static function getRandomGoodDevice()
    {
        $randomIdx = array_rand(self::DEVICES, 1);
        return self::DEVICES[$randomIdx];
    }

    /**
     * Retrieve all good devices.
     *
     * @return string[]
     */
    public static function getAllGoodDevices()
    {
        return self::DEVICES;
    }

    /**
     * Checks whether a device string is one of the good devices.
     *
     * @param string $deviceString
     *
     * @return bool
     */
    public static function isGoodDevice(
        $deviceString)
    {
        return in_array($deviceString, self::DEVICES, true);
    }
}
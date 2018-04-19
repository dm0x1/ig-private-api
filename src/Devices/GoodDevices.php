<?php

namespace InstagramAPI\Devices;

/**
 * Internal list of verified Android devices.
 *
 * @author SteveJobzniak (https://github.com/SteveJobzniak)
 *
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
 * When you have a "possibly good" agent, you must finally TEST IT: Use the
 * "devtools/checkDevices.php" developer script to check your agent and verify
 * that Instagram detects it as a high-resolution device and gives it HD videos!
 *
 *
 * LASTLY, YOU MUST UNDERSTAND THE FOLLOWING: THE DEVICE LIST BELOW IS MEANT TO
 * BE A "SNAPSHOT" OF DEVICES AND THEIR ANDROID VERSIONS AT THAT MOMENT IN TIME.
 * WE ARE *ONLY* SUPPOSED TO *ADD* NEW DEVICES TO IT OR COMPLETELY *DELETE* OLD
 * DEVICES. DO *NOT* "EDIT" THE LIST TO TRY TO "IMPROVE" OR "UPDATE" ANDROID
 * VERSIONS OR *ANYTHING* ELSE ABOUT AN EXISTING DEVICE. EDITING EVEN A *SINGLE*
 * BYTE WILL CAUSE *ALL* USERS OF THAT DEVICE TO BE LOGGED OUT AND *RE-ASSIGNED*
 * TO A BRAND NEW PHONE HARDWARE FINGERPRINT AND A DIFFERENT RANDOM DEVICE. THAT
 * BEHAVIOR IS INTENTIONAL AND *BY DESIGN*. IT ALLOWS US TO SAFELY BLACKLIST BAD
 * DEVICES AND IT DISCOURAGES DUMB, FRIVOLOUS "UPGRADES", THUS ENSURING THAT WE
 * *ONLY* IDENTIFY OUR DEVICES WITH THE ACTUAL *ANDROID* VERSION THEY *SHIPPED*
 * WITH, WHICH IS THE SAFEST WAY TO IDENTIFY OUR VIRTUAL DEVICES. MOST REAL
 * USERS DON'T UPGRADE ANDROID OS BEYOND WHAT THE PHONE ORIGINALLY SHIPPED WITH.
 *
 *
 * THIS DEVICE LIST IS CRITICAL TO THE OPERATION OF THE API. DO NOT CONTRIBUTE
 * TO THIS LIST IF YOU DON'T UNDERSTAND *ALL* INSTRUCTIONS ABOVE. PERFECTLY. ALL
 * CONTRIBUTIONS MUST INCLUDE THE RELEASE DATE, HANDSETDETECTION AND A LINK TO A
 * PAGE (SUCH AS AMAZON) FOR THAT EXACT MODEL SPECIFIER, AS SEEN BELOW, SO THAT
 * WE CAN VALIDATE ALL AGENTS TO SEE THAT YOU AREN'T ADDING AN INCORRECTLY
 * WRITTEN OR UNPOPULAR DEVICE AGENT WHICH WILL GET US BANNED BY INSTAGRAM!
 */
class GoodDevices
{
    /**
     * List of supported binary architectures for the device CPUs.
     *
     * NOTE TO COLLABORATORS: Currently all devices use the same 64-bit ARM list,
     * but if future added devices have different CPU capabilities, this will need
     * a rewrite to be able to specify different CPU_ABI values per-device. It's
     * very unlikely to happen, though, since we only add 64-bit CPU devices to the
     * list. And there's no real value to increasing ARM chip sizes beyond 64-bit
     * since the physical address lines take up more space, and there are no real
     * numerical benefits beyond 64-bit numbers. So we most likely won't need
     * any per-device values here.
     *
     * Also note that the list below is actually the two 32-bit ARM identifiers.
     * That's because Instagram is querying the 32-bit CPU_ABI1 and CPU_ABI2
     * constants, so the below is the correct CPU_ABI value on our 64-bit devices.
     *
     * @see https://developer.android.com/ndk/guides/abis.html
     *
     * @var string
     */
    const CPU_ABI = 'armeabi-v7a:armeabi';

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

        '24/7.0; 420dpi; 1080x2094; samsung; SM-G955W; dream2qltecan; qcom',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-A520F; a5y17lte; samsungexynos7880',
        '19/4.4.4; 240dpi; 480x800; samsung; GT-I9060I; grandneove3g; sc8830',
        '24/7.0; 320dpi; 720x1280; samsung; SM-A310F; a3xelte; samsungexynos7580',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-A510F; a5xelte; samsungexynos7580',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G935F; hero2lte; samsungexynos8890',
        '22/5.1.1; 320dpi; 720x1280; samsung; SM-J320F; j3xlte; sc8830',
        '21/5.0.2; 240dpi; 480x854; ag; style; style; mt6582',
        '25/7.1.2; 320dpi; 720x1280; Xiaomi; Redmi 4X; santoni; qcom',
        '23/6.0.1; 320dpi; 720x1280; Xiaomi; Redmi 3S; land; qcom',
        '22/5.1.1; 240dpi; 480x800; samsung; SM-J120F; j1xlte; universal3475',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; Redmi 4; markw; qcom',
        '24/7.0; 480dpi; 1080x2076; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-G570F; on5xelte; samsungexynos7570',
        '23/6.0; 480dpi; 1080x1920; Xiaomi; Redmi Note 4; nikel; mt6797',
        '24/7.0; 640dpi; 1440x2560; samsung/Verizon; SM-G925V; zeroltevzw; samsungexynos7420',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G930F; herolte; samsungexynos8890',
        '22/5.1.1; 240dpi; 480x854; LENOVO/Lenovo; Lenovo A2020a40; angus3A4; qcom',
        '23/6.0.1; 480dpi; 1080x1920; samsung; SM-G900F; klte; qcom',
        '24/7.0; 480dpi; 1080x1920; Xiaomi/xiaomi; Redmi Note 4; mido; qcom',
        '23/6.0.1; 240dpi; 540x960; samsung; SM-G532F; grandpplte; mt6735',
        '22/5.1; 480dpi; 1080x1920; Meizu; m3 note; m3note; mt6755',
        '21/5.0.2; 240dpi; 540x960; samsung; SM-A300F; a3lte; qcom',
        '23/6.0.1; 420dpi; 1080x1920; LeMobile/LeEco; Le X527; le_s2_ww; qcom',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G925F; zerolte; samsungexynos7420',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-A500F; a5lte; qcom',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G920F; zeroflte; samsungexynos7420',
        '19/4.4.2; 320dpi; 720x1280; samsung; GT-I9301I; s3ve3g; qcom',
        '24/7.0; 320dpi; 720x1280; samsung; SM-J710F; j7xelte; samsungexynos7870',
        '23/6.0.1; 480dpi; 1080x1920; samsung; SM-G610F; on7xelte; samsungexynos7870',
        '25/7.1.1; 420dpi; 1080x2094; samsung; SM-N950U; greatqlte; qcom',
        '24/7.0; 320dpi; 720x1280; HMD Global/Nokia; TA-1032; NE1; mt6735',
        '21/5.0.2; 640dpi; 1440x2560; samsung/Verizon; SM-G920V; zerofltevzw; samsungexynos7420',
        '24/7.0; 420dpi; 1080x2094; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; Redmi Note 3; kenzo; qcom',
        '24/7.0; 420dpi; 1080x2094; samsung; SM-G955U; dream2qltesq; qcom',
        '24/7.0; 480dpi; 1080x2076; samsung; SM-G950U; dreamqltesq; qcom',
        '22/5.1.1; 213dpi; 800x1280; samsung; SM-T330; milletwifi; qcom',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-G928R4; zenlteusc; samsungexynos7420',
        '19/4.4.2; 320dpi; 720x1184; HTC/htc; HTC Desire 820G PLUS dual sim; htc_a50mg; mt6592',
        '23/6.0.1; 320dpi; 720x1280; Xiaomi; Redmi 4A; rolex; qcom',
        '24/7.0; 320dpi; 720x1280; samsung; SM-A320F; a3y17lte; samsungexynos7870',
        '22/5.1.1; 240dpi; 540x960; samsung; SM-G531H; grandprimeve3g; sc8830',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; MI 5; gemini; qcom',
        '22/5.1; 320dpi; 720x1280; Meizu; M3s; M3s; mt6755',
        '23/6.0.1; 640dpi; 1440x2560; samsung; SM-G925W8; zeroltebmc; samsungexynos7420',
        '22/5.1.1; 320dpi; 720x1280; samsung; SM-E500H; e53g; qcom',
        '19/4.4.2; 213dpi; 800x1280; samsung; SM-T231; degas3g; pxa1088',
        '23/6.0.1; 320dpi; 720x1280; Xiaomi; Redmi 4X; santoni; qcom',
        '23/6.0; 320dpi; 720x1184; TECNO/tecno; TECNO-N9; N9; mt6735',
        '23/6.0.1; 480dpi; 1080x1776; Sony; D6633; D6633; qcom',
        '22/5.1.1; 240dpi; 480x800; samsung; SM-J105H; j1mini3gxw; sc8830',
        '22/5.1.1; 240dpi; 540x960; samsung; SM-G531F; grandprimevelte; pxa1908',
        '23/6.0; 320dpi; 720x1280; Infinix; Infinix HOT 4 Lite; X557-Lite; mt6580',
        '25/7.1.1; 272dpi; 720x1198; Sony; F5321; F5321; qcom',
        '23/6.0.1; 480dpi; 1080x1920; Xiaomi; MI 5s; capricorn; qcom',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G935F; hero2lte; samsungexynos8890',
        '16/4.1.2; 240dpi; 480x800; samsung; GT-I8552; delos3geur; qcom',
        '24/7.0; 560dpi; 1440x2560; samsung; SM-G925F; zerolte; samsungexynos7420',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-J510FN; j5xnlte; qcom',
        '23/6.0; 320dpi; 720x1280; LENOVO/Lenovo; Lenovo K10a40; K10a40; mt6735',
        '22/5.1.1; 240dpi; 540x960; samsung; SM-J200H; j23g; sc8830',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-A320FL; a3y17lte; samsungexynos7870',
        '24/7.0; 320dpi; 720x1199; LGE/lge; LG-M400; msf3; msf3',
        '23/6.0.1; 480dpi; 1080x1776; Sony; D6503; D6503; qcom',
        '24/7.0; 320dpi; 720x1193; LGE/MetroPCS; LGMP260; lv517; lv517',
        '24/7.0; 480dpi; 1080x1920; samsung; SAMSUNG-SM-G930A; heroqlteatt; qcom',
        '23/6.0; 320dpi; 720x1280; Infinix; Infinix_X521; Infinix-X521; mt6735',
        '24/7.0; 320dpi; 720x1280; samsung; SM-J530FM; j5y17lte; samsungexynos7870',
        '24/7.0; 640dpi; 1440x2768; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G930F; herolte; samsungexynos8890',
        '24/7.0; 480dpi; 1080x1812; HUAWEI; PRA-LA1; HWPRA-H; hi6250',
        '23/6.0; 320dpi; 720x1187; LGE/lge; LG-K350; mm1v; mm1v',
        '23/6.0; 320dpi; 720x1280; TCL; 5023F; Pixi4PlusPower; mt6580',
        '17/4.2.2; 240dpi; 480x800; samsung; GT-I9060; baffinlite; ja_baffinlite',
        '24/7.0; 420dpi; 1080x1920; samsung/Verizon; SM-N920V; nobleltevzw; samsungexynos7420',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G930T; heroqltetmo; qcom',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G935T; hero2qltetmo; qcom',
        '24/7.0; 320dpi; 720x1280; samsung; SM-G570F; on5xelte; samsungexynos7570',
        '24/7.0; 480dpi; 1080x1798; LGE/MetroPCS; LGMP450; sf340n; sf340',
        '24/7.0; 320dpi; 720x1187; LGE/MetroPCS; LGMS210; lv3; lv3',
        '19/4.4.4; 320dpi; 720x1280; samsung; GT-I9300I; s3ve3gds; qcom',
        '24/7.0; 480dpi; 1080x1812; HUAWEI/HONOR; NEM-L51; HNNEM-H; hi6250',
        '24/7.0; 640dpi; 1440x2560; samsung/Verizon; SM-G920V; zerofltevzw; samsungexynos7420',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-A720F; a7y17lte; samsungexynos7880',
        '22/5.1; 240dpi; 480x854; OPPO; 1201; 1201; mt6582',
        '23/6.0.1; 320dpi; 1600x2560; samsung; SM-T805; chagalllte; universal5420',
        '18/4.3; 480dpi; 1080x1776; Sony; C6603; C6603; qcom',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-A500H; a53g; qcom',
        '25/7.1.1; 480dpi; 1080x1776; Sony; F5121; F5121; qcom',
        '23/6.0; 320dpi; 720x1280; vivo; vivo 1713; 1601; mt6755',
        '19/4.4.2; 240dpi; 480x800; HUAWEI; HUAWEI Y336-U02; HWY336-U; sc8830',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-J700F; j7elte; samsungexynos7580',
        '19/4.4.2; 240dpi; 540x960; samsung; GT-I9195; serranolte; qcom',
        '19/4.4.4; 213dpi; 480x854; orange; orange fova; orangefova; qcom',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-A710F; a7xelte; samsungexynos7580',
        '19/4.4.2; 320dpi; 720x1280; samsung; SM-G7102; ms013g; qcom',
        '24/7.0; 480dpi; 1080x1776; Sony; F3212; F3212; mt6755',
        '22/5.1; 320dpi; 720x1184; HUAWEI/HONOR; TIT-L01; HWTIT-L6735; mt6735',
        '24/7.0; 240dpi; 480x854; motorola; Moto C; watson; mt6580',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-A500G; a5lte; qcom',
        '24/7.0; 320dpi; 720x1184; asus; ASUS_X008D; ASUS_X008; mt6735',
        '24/7.0; 320dpi; 720x1280; samsung; SM-J330F; j3y17lte; samsungexynos7570',
        '25/7.1.1; 320dpi; 720x1280; samsung; SM-J510FN; j5xnlte; qcom',
        '23/6.0.1; 640dpi; 1532x2560; samsung; SM-N915FY; tblte; qcom',
        '24/7.0; 480dpi; 1080x1920; Xiaomi; MI 5; gemini; qcom',
        '24/7.0; 480dpi; 1080x1794; HUAWEI/HONOR; FRD-L09; HWFRD; hi3650',
        '24/7.0; 480dpi; 1080x1812; HUAWEI/HONOR; PRA-TL10; HWPRA-H; hi6250',
        '24/7.0; 480dpi; 1080x1920; samsung/Verizon; SM-G930V; heroqltevzw; qcom',
        '23/6.0; 320dpi; 720x1280; TCL; 5080Q; shite; mt6735',
        '25/7.1.1; 480dpi; 1080x1920; Xiaomi; MI 6; sagit; qcom',
        '24/7.0; 480dpi; 1080x1920; HUAWEI/HONOR; STF-L09; HWSTF; hi3660',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-J730FM; j7y17lte; samsungexynos7870',
        '22/5.1.1; 320dpi; 720x1280; Xiaomi; Redmi 3; ido; qcom',
        '25/7.1.2; 432dpi; 1080x1920; OnePlus; unknown; OnePlus2; qcom',
        '25/7.1.1; 480dpi; 1080x1920; ZTE; Z982; crocus; qcom',
        '24/7.0; 480dpi; 1080x2076; samsung; SM-G950U1; dreamqlteue; qcom',
        '25/7.1.2; 640dpi; 1440x2712; LGE/lge; VS996; joan; joan',
        '25/7.1.1; 320dpi; 720x1280; motorola; Moto E (4) Plus; nicklaus_f; mt6735',
        '23/6.0.1; 320dpi; 720x1184; motorola; MotoG3; osprs; qcom',
        '23/6.0.1; 480dpi; 1080x1920; LENOVO/Lenovo; Lenovo K53a48; K53a48; qcom',
        '24/7.0; 560dpi; 1440x2792; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '24/7.0; 480dpi; 1080x2076; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '23/6.0.1; 440dpi; 1080x1920; Xiaomi; MI MAX; hydrogen; qcom',
        '25/7.1.1; 280dpi; 720x1396; samsung; SM-N950F; greatlte; samsungexynos8895',
        '26/8.0.0; 420dpi; 1080x2094; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '23/6.0.1; 320dpi; 720x1184; HTC/htc; HTC Desire 820 dual sim; htc_a51dtul; qcom',
        '23/6.0; 320dpi; 720x1192; HUAWEI; MYA-L11; HWMYA-L6737; mt6735',
        '23/6.0.1; 480dpi; 1080x1920; samsung; SM-G610M; on7xelte; samsungexynos7870',
        '24/7.0; 480dpi; 1080x1920; samsung; SM-G930W8; heroltebmc; samsungexynos8890',
        '24/7.0; 280dpi; 720x1280; samsung; SM-J530G; j5y17lte; samsungexynos7870',
        '23/6.0; 320dpi; 720x1208; HUAWEI/Huawei; ALE-L21; hwALE-H; hi6210sft',
        '23/6.0; 240dpi; 480x782; LG Electronics/lge; LG-X230; mlv1; mt6735',
        '26/8.0.0; 480dpi; 1080x1920; Xiaomi/xiaomi; Mi A1; tissrout; qcom',
        '19/4.4.4; 240dpi; 540x888; Sony; E2006; E2006; mt6752',
        '24/7.0; 480dpi; 1080x1920; samsung/Verizon; SM-G935V; hero2qltevzw; qcom',
        '22/5.1.1; 240dpi; 480x800; samsung; SM-J105B; j1mini3g; sc8830',
        '23/6.0.1; 480dpi; 1080x1920; ZTE; Z981; urd; qcom',
        '24/7.0; 280dpi; 720x1396; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '24/7.0; 480dpi; 1080x1794; HUAWEI; EVA-L09; HWEVA; hi3650',
        '24/7.0; 320dpi; 720x1280; samsung; SM-G930F; herolte; samsungexynos8890',
        '24/7.0; 420dpi; 1080x1920; samsung; SM-G930F; herolte; samsungexynos8890',
        '25/7.1.1; 440dpi; 1920x1080; Xiaomi; MI MAX 2; oxygen; qcom',
        '24/7.0; 480dpi; 1080x1812; HUAWEI; WAS-LX1A; HWWAS-H; hi6250',
        '23/6.0.1; 320dpi; 720x1280; samsung; SM-S550TL; on5ltetfntmo; universal3475',
        '23/6.0.1; 240dpi; 480x854; ZTE; Z798BL; stark; qcom',
        '27/8.1.0; 476dpi; 1440x2417; Google/google; Pixel XL; marlin; marlin',
        '25/7.1.1; 480dpi; 1080x1776; Sony; E6853; E6853; qcom',
        '26/8.0.0; 420dpi; 1080x1920; OnePlus; ONEPLUS A5000; OnePlus5; qcom',
        '24/7.0; 640dpi; 1440x2768; samsung; SM-G950W; dreamqltecan; qcom',
        '23/6.0; 320dpi; 720x1184; motorola; XT1072; thea; qcom',
        '25/7.1.1; 560dpi; 1440x2792; samsung; SM-N950F; greatlte; samsungexynos8895',
        '25/7.1.1; 480dpi; 1080x2004; LGE/lge; LG-M700; mh; mh',
        '21/5.0.2; 480dpi; 1080x1920; Xiaomi; Redmi Note 2; hermes; mt6795',
        '24/7.0; 280dpi; 720x1396; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '24/7.0; 420dpi; 2094x1080; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '24/7.0; 320dpi; 720x1280; motorola; Moto C Plus; panell_d; mt6735',
        '19/4.4.2; 240dpi; 480x800; WIKO; BLOOM; wiko; mt6582',
        '24/7.0; 640dpi; 1440x2768; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '26/8.0.0; 408dpi; 1080x1920; Xiaomi/xiaomi; Mi A1; tissrout; qcom',
        '24/7.0; 420dpi; 1080x2094; samsung; SM-G950F; dreamlte; samsungexynos8895',
        '24/7.0; 280dpi; 1396x720; samsung; SM-G955F; dream2lte; samsungexynos8895',
        '24/7.0; 320dpi; 720x1280; samsung; SM-G935F; hero2lte; samsungexynos8890',
        '24/7.0; 288dpi; 1080x1834; HUAWEI; HUAWEI NMO-L31; HWNMO-H; hi6250',
        '25/7.1.1; 480dpi; 1080x2076; samsung; SM-N950F; greatlte; samsungexynos8895',
        '23/unknown; 480dpi; 1080x1836; unknown; unknown; unknown; hi3635',
        '24/7.0; 640dpi; 1440x2560; samsung; SM-G920I; zeroflte; samsungexynos7420',
        '27/8.1.0; 560dpi; 2392x1440; Google/google; Pixel XL; marlin; marlin',
        '24/7.0; 320dpi; 720x1208; HUAWEI; TRT-AL00A; HWTRT-Q; qcom',
        '22/5.1; 320dpi; 720x1280; Coolpad; CP8298_I00; CP8298_I00; mt6735',
        '24/7.0; 420dpi; 1080x1920; samsung; SAMSUNG-SM-N920A; noblelteatt; samsungexynos7420)',

    ];

    /**
     * Retrieve the device string for a random good device.
     *
     * @return string
     */
    public static function getRandomGoodDevice()
    {
    	$randomIdx = random_int(0, count(self::DEVICES) - 1);

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

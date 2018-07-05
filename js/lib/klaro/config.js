
// By default, Klaro will load the config from  a global "klaroConfig" variable.
// You can change this by specifying the "data-config" attribute on your
// script take, e.g. like this:
// <script src="klaro.js" data-config="myConfigVariableName" />
// You can also disable auto-loading of the consent notice by adding
// data-no-auto-load=true to the script tag.
var klaroConfig = {

    // You can customize the ID of the DIV element that Klaro will create
    // when starting up. If undefined, Klaro will use 'klaro'.
    elementID: 'klaro',

    // You can customize the name of the cookie that Klaro uses for storing
    // user consent decisions. If undefined, Klaro will use 'klaro'.
    cookieName: 'klaro',

    // You can also set a custom expiration time for the Klaro cookie.
    // By default, it will expire after 120 days.
    cookieExpiresAfterDays: 365,

    // You can customize the name of the cookie that Klaro will use to
    // store user consent. If undefined, Klaro will use 'klaro'.
 
    // Put a link to your privacy policy here (relative or absolute).
    privacyPolicy: window.privacy_policy_page,
    
    // Defines the default state for applications (true=enabled by default).
    default: true,

    // If "mustConsent" is set to true, Klaro will directly display the consent
    // manager modal and not allow the user to close it before having actively
    // consented or declines the use of third-party apps.
    mustConsent: false,

    // You can define the UI language directly here. If undefined, Klaro will
    // use the value given in the global "lang" variable. If that does
    // not exist, it will use the value given in the "lang" attribute of your
    // HTML tag. If that also doesn't exist, it will use 'en'.
    lang: window.lang_attr,

    // You can overwrite existing translations and add translations for your
    // app descriptions and purposes. See `src/translations.yml` for a full
    // list of translations that can be overwritten:
    // https://github.com/DPKit/klaro/blob/master/src/translations.yml

    // Example config that shows how to overwrite translations:
    // https://github.com/DPKit/klaro/blob/master/src/configs/i18n.js
    translations: {
        // If you erase the "consentModal" translations, Klaro will use the
        // defaults as defined in translations.yml
        en_US: {
            consentModal: {
                title: 'Information that we collect',
                description: 'Here you can see and customize the information that we collect about you.',
                privacyPolicy: {
                    name: 'privacy policy',
                    text: 'To learn more, please read our {privacyPolicy}.',
                }
            },
            consentNotice: {
                changeDescription: 'There were changes since your last visit, please update your consent.',
                description: 'We collect and process your personal information for the following purposes: {purposes}.',
                learnMore: 'Learn more',
            },
            privacyPolicy: {
                text: 'This is the text with a link to your {privacyPolicy}.',
                name: 'privacy policy (the name)',
            },
            poweredBy: '',
            ok: 'Accept',
            save: 'Save',
            decline: 'Decline',
            app: {
                disableAll: {
                    title: 'Toggle all apps',
                    description: 'Use this switch to enable/disable all apps.',
                },
                purpose: 'Purpose',
            },
            analytics: {
                description: 'Collecting of visitor statistics',
            },
            purposes: {
                analytics: 'Analytics',
                security: 'Security',
            },
        },
        lv_LV: {
            consentModal: {
                title: 'Informācija, ko mēs apkopojam',
                description: 'Šeit Jūs varat redzēt un pielāgot informāciju, ko mēs par Jums apkopojam.',
                privacyPolicy: {
                    name: 'privātuma politiku',
                    text: 'Lai uzzinātu vairāk izlasiet mūsu {privacyPolicy}.',
                }
            },
            consentNotice: {
                changeDescription: 'There were changes since your last visit, please update your consent.',
                description: 'Mēs apkopojam un apstrādājam Jūsu personisko informāciju šādiem mērķiem: {purposes}.',
                learnMore: 'Uzzināt vairāk',
            },
            poweredBy: '',
            ok: 'Apstiprināt',
            save: 'Saglabāt',
            decline: 'Noraidīt',
            app: {
                disableAll: {
                    title: 'Pārslēgt visas lietotnes',
                    description: 'Izmantojiet šo slēdzi, lai iespējotu/atspējotu visas lietotnes.',
                },
                purpose: 'Nolūks',
            },
            analytics: {
                description: 'Apmeklētāju statistikas apkopošana',
            },
            purposes: {
                analytics: 'Analīze',
            },
        },
    },

    // This is a list of third-party apps that Klaro will manage for you.
    apps : [
        // The apps will appear in the modal in the same order as defined here.
        {
            name : 'analytics',
            title : 'Google Analytics',
            purposes : ['analytics'],
            cookies : ['_ga', '_gid', '_gat', /^_gac_.*$/i]
        },
    ],
}
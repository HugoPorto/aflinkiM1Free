(() => {
    const getCookie = (name) => {
        const value = " " + document.cookie;
        const parts = value.split(" " + encodeURIComponent(name) + "=");
        const result = parts.length < 2 ? undefined : parts.pop().split(";").shift();
        return result;
    };

    const setCookie = function (name, value, expiryDays, domain, path, secure) {
        const exdate = new Date();
        exdate.setTime(
            exdate.getTime() +
            (typeof expiryDays !== "number" ? 7 : expiryDays) * 24 * 60 * 60 * 1000
        );
        document.cookie =
            encodeURIComponent(name) +
            "=" +
            encodeURIComponent(value) +
            ";expires=" +
            exdate.toUTCString() +
            ";path=" +
            (path || "/") +
            (domain ? ";domain=" + domain : "") +
            (secure ? ";secure" : "");
    };

    const setPreferredLanguage = (language) => {
        setCookie('preferredLanguage', language, 365);
        window.location.reload(true);
    };

    const $cookiesBanner = document.querySelector(".cookies-eu-banner");

    const cookieName = "cookiesAccepted";

    const hasCookie = getCookie(cookieName);

    if ($cookiesBanner) {
        const $cookiesBannerButton = $cookiesBanner.querySelector("button");

        if (!hasCookie) {
            $cookiesBanner.classList.remove("hidden");
        } else {
            $cookiesBanner.remove();
        }

        if ($cookiesBannerButton) {
            $cookiesBannerButton.addEventListener("click", () => {
                setCookie(cookieName, "accepted");
                $cookiesBanner.remove();
            });
        }
    }

    const languageButtonIdEUA = "eua";

    const $languageButton = document.getElementById(languageButtonIdEUA);

    if ($languageButton) {
        $languageButton.addEventListener("click", () => {
            console.log("click");
            setPreferredLanguage("en_US");
        });
    }

    const languageButtonIdBrazil = "brazil";
    const $languageButtonBrazil = document.getElementById(languageButtonIdBrazil);

    if ($languageButtonBrazil) {
        $languageButtonBrazil.addEventListener("click", () => {
            setPreferredLanguage("pt_BR");
        });
    }
})();

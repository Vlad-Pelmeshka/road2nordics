document.addEventListener("DOMContentLoaded", function () {
    const currencySelect = document.getElementById("currency-select");
    const defaultBase = "USD";
    let retryCount = 0;

    // --- Ensure USD is the default on first load ---
    let currentCurrency = localStorage.getItem("currency")?.trim().toUpperCase();
    if (!currentCurrency || !["USD", "EUR"].includes(currentCurrency)) {
        currentCurrency = defaultBase;
        localStorage.setItem("currency", defaultBase);
    }

    // --- Set the dropdown to the correct currency ---
    if (currencySelect) {
        currencySelect.value = currentCurrency;
    }

    function updatePrices(targetCurrency) {
        const base = defaultBase.trim().toUpperCase();
        const target = targetCurrency.trim().toUpperCase();

        // Save in cookie for PHP
        document.cookie = `currency=${target}; path=/`;

        if (!base || !target) {
            console.error("❌ Missing base or target currency");
            return;
        }

        if (base === target) {
            console.log("⚠️ Base and target currencies are the same. Skipping fetch.");
            document.querySelectorAll("[data-price-usd]").forEach((el) => {
                const usd = parseFloat(el.getAttribute("data-price-usd").replace(',', '.'));
                if (!isNaN(usd)) {
                    el.textContent = `$${usd.toFixed(2)}`;
                }
            });

            // Reset URLs back to USD
            document.querySelectorAll("[data-url-eur][data-url-usd]").forEach((link) => {
                const href = link.getAttribute("data-url-usd");
                if (href) link.setAttribute("href", href);
            });

            return;
        }

        const apiUrl = `/wp-json/currency/v1/rate?base=${base}&target=${target}`;
        console.log("📡 Fetching currency rate:", apiUrl);

        fetch(apiUrl)
            .then((res) => {
                if (res.status === 404 && retryCount < 3) {
                    retryCount++;
                    console.warn("❗ REST API not ready yet, retrying in 1s...");
                    setTimeout(() => updatePrices(targetCurrency), 1000);
                    return;
                }
                if (!res.ok) throw new Error(`API error: ${res.status}`);
                return res.json();
            })
            .then((data) => {
                if (!data || !data.rate) {
                    console.warn("⚠️ No rate returned from API.");
                    return;
                }

                const rate = parseFloat(data.rate);
                const symbol = target === "EUR" ? "€" : "$";

                document.querySelectorAll("[data-price-usd]").forEach((el) => {
                    const raw = el.getAttribute("data-price-usd").replace(',', '.');
                    const usd = parseFloat(raw);
                    if (!isNaN(usd)) {
                        const converted = (usd * rate).toFixed(2);
                        el.textContent = `${symbol}${converted}`;
                    }
                });

                document.querySelectorAll("[data-url-eur][data-url-usd]").forEach((link) => {
                    const href = target === "USD"
                        ? link.getAttribute("data-url-usd")
                        : link.getAttribute("data-url-eur");
                    if (href) link.setAttribute("href", href);
                });

                retryCount = 0;
            })
            .catch((err) => {
                console.error("🚫 Currency API error:", err);
            });
    }

    // --- Initial call ---
    setTimeout(() => updatePrices(currentCurrency), 300);

    // --- On dropdown change ---
    if (currencySelect) {
        currencySelect.addEventListener("change", function () {
            const selected = this.value.trim().toUpperCase();
            localStorage.setItem("currency", selected);
            updatePrices(selected);
        });
    }
});

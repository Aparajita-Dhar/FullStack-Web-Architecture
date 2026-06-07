/**
 * Module 2: Client-Side Scripting Architecture (JavaScript DOM Validation Engine)
 * Manages event hooks, pattern validation matching, and asynchronous structural updates.
 */

document.addEventListener("DOMContentLoaded", () => {
    const registrationForm = document.getElementById("registrationForm");

    if (registrationForm) {
        registrationForm.addEventListener("submit", (event) => {
            // Intercept form submission to apply custom programmatic evaluation gates
            if (!validateFormEngine()) {
                event.preventDefault(); // Stop network transmission if validation fails
                console.error("[DOM Engine] Data packet deployment halted due to structural validation errors.");
            } else {
                alert("[DOM Engine] Front-end sanitization complete. Dispatching data payload to server-side CGI processing layer.");
            }
        });
    }
});

function validateFormEngine() {
    const aliasInput = document.getElementById("username").value.trim();
    const emailInput = document.getElementById("email").value.trim();
    
    // Pattern Rule: Letters and numbers only, minimum 4 characters
    const aliasRegex = /^[a-zA-Z0-9]{4,}$/;
    // Standard secure email parsing validation pattern
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!aliasRegex.test(aliasInput)) {
        alert("Client-Side Error: Developer Alias must be alphanumeric and contain at least 4 characters.");
        return false;
    }

    if (!emailRegex.test(emailInput)) {
        alert("Client-Side Error: Invalid Academic Email format framework detected.");
        return false;
    }

    // Append dynamic runtime diagnostic nodes to the web page UI
    renderRuntimeTelemetry(aliasInput);
    return true;
}

function renderRuntimeTelemetry(alias) {
    let telemetryBox = document.getElementById("telemetryLog");
    
    if (!telemetryBox) {
        telemetryBox = document.createElement("div");
        telemetryBox.id = "telemetryLog";
        telemetryBox.style.marginTop = "20px";
        telemetryBox.style.padding = "15px";
        telemetryBox.style.background = "#e8f8f5";
        telemetryBox.style.borderLeft = "5px solid #2ecc71";
        document.querySelector(".container").appendChild(telemetryBox);
    }
    
    const timestamp = new Date().toLocaleTimeString();
    telemetryBox.innerHTML = `<strong>[Telemetry Node Active]</strong> Last Validated User: <em>${alias}</em> at ${timestamp}`;
}

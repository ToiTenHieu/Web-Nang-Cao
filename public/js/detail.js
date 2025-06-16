window.addEventListener('DOMContentLoaded', () => {
    const checkinInput = document.getElementById('checkin-date');
    const checkoutInput = document.getElementById('checkout-date');
    const hiddenCheckin = document.getElementById('hidden-checkin');
    const hiddenCheckout = document.getElementById('hidden-checkout');

    const fpCheckin = flatpickr(checkinInput, {
        minDate: "today",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            if (!dateStr) return;
            hiddenCheckin.value = dateStr;

            // Tự động cập nhật min ngày đi
            const nextDay = new Date(dateStr);
            nextDay.setDate(nextDay.getDate() + 1);
            fpCheckout.set('minDate', nextDay);
        }
    });

    const fpCheckout = flatpickr(checkoutInput, {
        minDate: new Date().fp_incr(1),
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            if (!dateStr) return;
            hiddenCheckout.value = dateStr;
        }
    });
});

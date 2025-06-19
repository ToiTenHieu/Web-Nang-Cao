window.addEventListener('DOMContentLoaded', () => {
    const checkinInput = document.getElementById('checkin-date');
    const checkoutInput = document.getElementById('checkout-date');
    const hiddenCheckin = document.getElementById('hidden-checkin');
    const hiddenCheckout = document.getElementById('hidden-checkout');
    const nightsDiv = document.getElementById('nights');
    const totalAmountDiv = document.getElementById('total-amount');
    const pricePerDay = parseInt(document.getElementById('price').value);

    const fpCheckin = flatpickr(checkinInput, {
        minDate: "today",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            if (!dateStr) return;
            hiddenCheckin.value = dateStr;

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

            // Tính số đêm và tổng tiền
            const checkinDate = new Date(hiddenCheckin.value);
            const checkoutDate = new Date(hiddenCheckout.value);
            const diffTime = checkoutDate - checkinDate;
            const nights = diffTime / (1000 * 60 * 60 * 24);

            if (nights > 0) {
                nightsDiv.textContent = `Số đêm: ${nights} đêm`;
                const totalAmount = nights * pricePerDay;
                totalAmountDiv.textContent = `Tổng tiền cần thanh toán: ${totalAmount.toLocaleString()} đ`;
            } else {
                nightsDiv.textContent = '';
                totalAmountDiv.textContent = '';
            }
        }
    });
});

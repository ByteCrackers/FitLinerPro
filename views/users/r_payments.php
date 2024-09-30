<?php
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; 
?>

<div class="rounded-2xl pt-4 pr-4 pb-4 pl-4 mt-8 mr-0 mb-8 ml-0 border-2">
    <div>
        <p class="text-base font-bold">Recent Payments</p>
    </div>
    <div id="recent-payments">
        <!-- Dynamic payment records will be added here -->
    </div>
</div>

<script>
async function fetchRecentPayments(userId) {
    const response = await fetch(`../views/users/fetch_payments.php?user_id=${userId}`);
    console.log(response);
    
    // Check if the response is OK
    if (!response.ok) {
        console.error('Network response was not ok:', response.statusText);
        return;
    }

    const data = await response.json();

    // Debug: Check the structure of the data received
    console.log('Payments data:', data);

    populatePayments(data);
}

function populatePayments(payments) {
    const paymentsContainer = document.getElementById('recent-payments');
    paymentsContainer.innerHTML = ''; // Clear existing records

    if (payments.length === 0) {
        paymentsContainer.innerHTML = '<p>No recent payments found.</p>';
        return;
    }

    payments.forEach(payment => {
        const paymentDiv = document.createElement('div');
        paymentDiv.className = 'flex items-center justify-between mt-4 mr-0 mb-0 ml-0';
        paymentDiv.innerHTML = `
            <div class="mt-0 mr-auto mb-0 ml-0">
                <p class="text-base font-bold">${payment.payment_month}</p>
                <p class="text-base">${payment.payment_date}</p>
            </div>
            <p class="text-sm">LKR ${parseFloat(payment.amount).toLocaleString()}</p>
        `;
        paymentsContainer.appendChild(paymentDiv);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const userId = <?php echo json_encode($userId); ?>; // Embed PHP variable
    fetchRecentPayments(userId);
});
</script>


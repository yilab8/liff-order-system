liff.init({ liffId: "{{ env('LIFF_ID') }}" })
.then(() => {
    if (liff.isInClient()) {
        console.log("LIFF initialized");
    } else {
        liff.login();
    }
})
.catch(err => console.error("LIFF error", err));

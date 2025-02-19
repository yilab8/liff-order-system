let userProfile = null;

liff.init({ liffId: "{{ env('LIFF_ID') }}" })
.then(() => {
    if (liff.isInClient()) {
        return liff.getProfile();
    } else {
        liff.login();
    }
})
.then(profile => {
    userProfile = profile;
})
.catch(err => console.error("LIFF error", err));

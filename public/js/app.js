const baseUrl = `${window.location.origin}`;

function fiturBelumTersedia() {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Fitur belum tersedia"
    });
}

async function showConfirmationDialog(message) {
    const result = await Swal.fire({
        title: message,
        showCancelButton: true,
        confirmButtonText: "Ya",
    });
    return result.isConfirmed;
}

async function deleteResource(url) {
    try {
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        });

        if (!response.ok) {
            throw new Error('Terjadi kesalahan: ' + response.statusText);
        }

        return response;
    } catch (error) {
        throw new Error(error.message);
    }
}

async function hapusDiskusi(id_diskusi) {
    const isConfirmed = await showConfirmationDialog("Apakah kamu ingin menghapus diskusi?");
    if (isConfirmed) {
        try {
            const url = `${baseUrl}/topic/${id_diskusi}/delete`;
            await deleteResource(url);
            Swal.fire("Diskusi berhasil dihapus", "", "success");
            window.location.href = baseUrl; // Redirect ke base URL setelah berhasil
        } catch (error) {
            Swal.fire({
                icon: "error",
                title: "Walaweh :(",
                text: error.message,
            });
        }
    }
}

async function hapusTanggapan(id_tanggapan) {
    const isConfirmed = await showConfirmationDialog("Apakah kamu ingin menghapus tanggapan?");
    if (isConfirmed) {
        try {
            const url = `${baseUrl}/comment/${id_tanggapan}/delete`;
            await deleteResource(url);
            Swal.fire("Tanggapan berhasil dihapus", "", "success");
            window.location.reload(); // Reload halaman setelah berhasil
        } catch (error) {
            Swal.fire({
                icon: "error",
                title: "Walaweh :(",
                text: error.message,
            });
        }
    }
}

function addQueryParamAndRedirect(key, value) {
    let currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set(key, value);
    window.location.href = currentUrl.toString();
}

function addAllQueryParamAndRedirect(querys) {
    let currentUrl = new URL(window.location.href);
    for(const query of querys) {
        currentUrl.searchParams.set(query.key, query.value);
    }
    window.location.href = currentUrl.toString();
}

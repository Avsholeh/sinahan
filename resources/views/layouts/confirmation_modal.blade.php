<!-- Hapus Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Apakah anda yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Jika anda memilih untuk menghapus, maka data akan dihapus dari penyimpanan dan
                tidak dapat dikembalikan.
            </div>

            {{-- delete --}}
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                <a id="konfirmasi" class="btn btn-primary" href="javascript:void(0)">Konfirmasi</a>
            </div>
            {{-- END delete --}}

{{--            <form id="form-delete" action="#" method="post" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
        </div>
    </div>
</div>

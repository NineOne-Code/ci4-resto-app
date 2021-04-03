<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
	<div class="row">
		<div class="col">
			<h1 class="mt-2">Menu Asyqiue dihari ini...</h1>
			<div class="d-flex">
				<?php foreach ($foods as $food) : ?>
					<input type="hidden" name="id" value="<?= $food['id'] ?>">
					<div class="card m-2 shadow" style="width: 18rem;">
						<img height="200" src="img/<?= $food['image'] ?>" class="card-img-top menu-image-index" alt="<?= $food['name'] ?>">
						<div class="card-body">
							<div class="d-flex justify-content-between">
								<h5 class="card-title" name="name"><?= $food['name'] ?></h5>
								<p class="card-text text-gray">$<?= $food['price'] ?></p>
							</div>
							<a href="#" class="btn btn-primary mx-auto d-block btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="<?= $food['id'] ?>">Detail</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Detail Menu</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="card mb-3" style="max-width: 540px;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="..." width="150" height="260" class="menu-image" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title menu-title">Card title</h5>
								<div class="bg-light card-body card-comment" data-bs-toggle="modal" data-bs-target="#reviewersModal" data-bs-dismiss="modal">
									<div class="badge bg-success fst-italic text-wrap">Best Review:</div>
									<p class="card-text menu-comment">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
									<p class="card-text text-end"><small class="text-muted menu-comment-name">-Last</small></p>
								</div>
								<p class="card-text fw-bold mt-4">$<small class="text-dark menu-price"></small>,-</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<caption>$ <span class="total-price">100,00</span>- (Total) </caption><input type="number" class="qty" name="input" onchange="handleQTY()" value="0"><a type="button" role="button" data-bs-toggle="modal" data-bs-target="#finishModal" data-bs-dismiss="modal" class="btn btn-primary d-block btn-finish">Selesai</a>
			</div>
		</div>
	</div>
</div>
<!-- End Detail Modal -->

<!-- Finish Modal -->
<div class="modal fade" id="finishModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="finishModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="finishModalLabel">Tagihan Anda</h5>
			</div>
			<div class="modal-body bill-body"></div>
			<div class="modal-footer justify-content-between">
				<p class="text-start">Total: $<strong class="bill-total text-dark"></strong></p>
				<div class="finish-modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payModal">Bayar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Finish Modal -->

<!-- Reviewers Scrollable modal -->
<div class="modal fade" id="reviewersModal" tabindex="-1" aria-labelledby="reviewersModalLabel" aria-hidden="true">
	<div class=" modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reviewersModalLabel">Review <strong class="menu-title"></strong></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body list-reviews"></div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- End Reviewers Scrollable modal -->

<!-- Pay Modal -->
<div class="modal fade" id="payModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title modal-title-process">Total Tagihan anda: $<strong class="bill-total"></strong>,-</h5>
			</div>
			<div class="modal-body modal-body-process">
				<div class="input-group mb-3">
					<span class="input-group-text">$</span>
					<input type="number" class="form-control input-pay" onchange="beforeProcess()" aria-label="Amount (to the nearest dollar)">
					<span class="input-group-text">.00</span>
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-success btn-process" disabled>Proses</button>
			</div>
		</div>
	</div>
</div>
<!-- End Pay Modal -->
<?= $this->endSection() ?>
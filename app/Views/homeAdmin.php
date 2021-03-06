<main class="dashboard row">
  <div class="container-fluid">
    <section class="dashboard-content row d-flex align-items-start justify-content-around mt-5">
      <div class="posts-list-admin-container container col-lg-6">
        <div class="posts-list-admin-row row">
          <table class="posts-list-admin table table-striped table-bordered table-hover table-sm table-responsive-sm text-center mb-5">
            <thead>
              <tr>
                <th rowspan="2">Titre du billet</th>
                <th colspan="2">Date</th>
                <th colspan="3">Nombre de commentaires</th>
              </tr>
              <tr>
                <th scope="col">Création</th>
                <th scope="col">Edition</th>
                <th scope="col">Publiés</th>
                <th scope="col">Signalés</th>
                <th scope="col">Supprimés</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tpl->viewVars['allPosts'] as $key => $value) :?>
              <tr>
                <th scope="row">
                  <a href="<?= $tpl->basePath; ?>/post?id= <?= $value->getId_post(); ?>" class="post-title-cell">
                    <?= $value->getTitle(); ?>
                  </a>
                </th>
                <td>
                  <?= $value->getCreationDate(); ?>
                </td>
                <td>
                  <?= $value->getUpdateDate(); ?>
                </td>
                <td>
                  <?= $value->getNumberCommentsPublished(); ?>
                </td>
                <td class="report-comment text-danger">
                  <?= $value->getNumberCommentsReported(); ?>
                </td>
                <td class="report-comment text-primary">
                  <?= $value->getNumberCommentsDeleted(); ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        
        <?php if ($tpl->viewVars['totalPosts'] >= 10):?>
        <div class="row d-flex justify-content-center">
          <nav class="posts-list-pagination" aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link prev" href="#" aria-label="Previous">
                  <span aria-hidden="true">
                    <i class="fas fa-angle-double-left"></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link next" href="#" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="fas fa-angle-double-right"></i>
                  </span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <?php endif; ?>
      </div>

      <div class="comments-report-list container d-flex flex-column col-lg-5">
        <?php foreach ($tpl->viewVars['allCommentsReported'] as $key => $value) :?>
        <div class="comment-report-row row ">
          <div class="comment-report container d-flex flex-column">
            <div class="comment-header row d-flex justify-content-between p-4">
              <h6 class="comment-author align-self-end">
                <?= $value->getAuthor(); ?>
              </h6>
              <h3 class="comment-post-title">
                <?= $value->getTitle(); ?>
              </h3>
              <!-- FAIRE CSS  -->
              <h6 class="comment-date align-self-end">
                <?= $value->getCommentDate(); ?>
              </h6>
            </div>
            <article class="comment-content row m-0 pb-3 px-5">
              <?= $value->getCommentContent(); ?>
            </article>
            <div class="btn-group d-flex justify-content-between">
              <form action="<?= $tpl->basePath; ?>/admin/validate" method="post" class="row ml-4 mb-4">
                <input type="hidden" name="idComment" value="<?= $value->getIdComment(); ?>">
                <button type="submit" class="validate btn btn-success btn-md px-4" name="report">
                  Valider
                </button>
              </form>
              <form action="<?= $tpl->basePath; ?>/admin/reject" method="post" class="row mr-4 mb-4">
                <input type="hidden" name="idComment" value="<?= $value->getIdComment(); ?>">
                <button type="submit" class="delete btn btn-warning btn-md px-3" name="report">
                  Supprimer
                </button>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        <?php if ($tpl->viewVars['totalComments'] >= 3):?>
        <div class="row d-flex justify-content-center mt-5">
          <nav class="posts-list-pagination" aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link prev" href="#" aria-label="Previous">
                  <span aria-hidden="true">
                    <i class="fas fa-angle-double-left"></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link next" href="#" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="fas fa-angle-double-right"></i>
                  </span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <?php endif; ?>
      </div>
    </section>
  </div>
</main>